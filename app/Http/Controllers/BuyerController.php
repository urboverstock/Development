<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPost;
use App\Models\User;
use App\Models\Payment;
use App\Models\UserDocument;
use App\Models\ProductCategory;
use App\Models\ProductCompanies;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Address;
use App\Models\ProductImage;
use App\Models\UserFollowers;
use App\Models\Cart;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreStripeRequest;
use Auth, Validator, DB;
use Illuminate\Support\Str;
use Stripe;
use Config;

class BuyerController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function index(Request $request)
    {
        if(Auth::check())
        {
            $user_posts = UserPost::with('getUserPostFile', 'getUser')->where('user_id', '<>', Auth::user()->id)->latest()->get();
        }
        else
        {
            $user_posts = UserPost::with('getUserPostFile', 'getUser')->latest()->get();
        }

        $request->request->add(['limit' => 6]);
        $latestProducts = Product::getLatestProducts($request);
        $request->request->add(['limit' => 3]);
        $sellers = User::getSellers($request);
        // echo "<pre>"; print_r($latestProducts); die;
        return view('common.home', compact('latestProducts', 'sellers', 'user_posts'));
    }

    public function dashboard(Request $request)
    {

      if(!Auth::check()){
        return redirect()->route('signin')->with('error', 'You need to login first');
      }
      $user = User::find(Auth::user()->id);
      $followers = UserFollowers::where(['follower_id'=>Auth::user()->id])->count();
      $followings = UserFollowers::where(['user_id'=>Auth::user()->id])->count();
      return view('buyer.dashboard', compact('user','followers','followings'));
    }

    public function edit_profile(Request $request){

        $user = User::find(Auth::user()->id);

        if($request->isMethod('post')){
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'first_name' => 'required',
                'last_name' => 'required',
                'isd_code' => 'required|digits_between:2,3',
                'phone_number' => 'required|digits:10,10',
                // 'email' => 'required|email|unique:users',
                'location' => 'required',
                'billing_address' => 'required',
                'about' => 'required',
                // 'gender' => 'required'
            ],[
                'about.required' => 'The bio field is required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }

            $user->first_name       = $postData['first_name'];
            $user->last_name        = $postData['last_name'];
            $user->isd_code         = $postData['isd_code'];
            $user->phone_number     = $postData['phone_number'];
            $user->location         = $postData['location'];
            $user->billing_address  = $postData['billing_address'];
            $user->about            = $postData['about'];


            if(isset($postData['profile_pic']) && !empty($postData['profile_pic'])){
                $user->profile_pic = UploadImage($postData['profile_pic'], $this->uploadUserProfilePath);
            }

            if($user->save()){
                return redirect()->route('buyer.view_profile');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        return view('buyer.edit_profile', compact('user'));
    }

    public function view_profile(){

        $user = User::where('id', Auth::id())
                ->with('products.product_image')
                ->first();

        if(!empty($user)){
            $user = $user->toArray();
        }
        // echo "<pre>"; print_r($user); die;

        return view('buyer.view_profile', compact('user'));
    }

    public function get_followers(){
        if(!Auth::check()){
            return redirect()->route('signin')->with('error', 'You need to login first');
        }
        $user = User::find(Auth::user()->id);
        $followers = UserFollowers::where(['follower_id'=>Auth::user()->id])->count();
        $followings = UserFollowers::where(['user_id'=>Auth::user()->id])->count();

        $get_followers = DB::table('user_followers')
                    ->distinct()
                    ->select("users.id","users.first_name","users.profile_pic","user_followers.id","user_followers.user_id","user_followers.follower_id")
                    ->leftJoin('users', function ($join) {
                        $join->on('user_followers.user_id', '=', 'users.id');
                    })
                    ->where('user_followers.follower_id', '=', Auth::user()->id)
                    ->get();

        $get_followings = DB::table('user_followers')
                    ->distinct()
                    ->select("users.id","users.first_name","users.profile_pic","user_followers.id","user_followers.user_id","user_followers.follower_id")
                    ->leftJoin('users', function ($join) {
                        $join->on('user_followers.follower_id', '=', 'users.id');
                    })
                    ->where('user_followers.user_id', '=', Auth::user()->id)
                    ->get();

        //echo "<pre>";print_r($get_followings);die;
        return view('buyer.show_followers', compact('user','followers','followings','get_followers','get_followings'));
    }

    // Checkout functionality
    public function checkout()
    {
        $user_id = Auth::user()->id;
        $c_total_quantity = Cart::where('user_id', $user_id)->sum('quantity');
        $carts = Cart::with('product')->where('user_id', $user_id)->get()->toArray();
        $addresses = Address::where('user_id', $user_id)->get()->toArray();

        if(count($carts) > 0)
        {
            foreach ($carts as $key => $cart)
            {
                $carts[$key]['p_price'] = $cart['product']['price'];
                $carts[$key]['p_total_price'] = $cart['product']['price'] * $cart['quantity'];
            }
        }

        $p_total_price_column = array_column($carts, 'p_total_price');
        $total_price = array_sum($p_total_price_column);

        return view('buyer.checkout', compact('addresses', 'carts', 'c_total_quantity', 'total_price'));
    }

    public function payment(Request $request)
    {
        return view('stripe.stripe', compact('request'));
    }

    // Save order in order and order details tables and also decrement the product table quantity
    public function saveOrder(StoreStripeRequest $request)
    {
        $carts = Cart::with('product')->where('user_id', Auth::user()->id)->get()->toArray();

        DB::beginTransaction();
        try
        {
            Stripe\Stripe::setApiKey(Config::get('services.stripe.secret'));
            

            $charge = Stripe\Charge::create([
                'source' => $request->stripeToken,
                'currency' => 'inr',
                'amount' => $request->total_price * 100,
                'description' => 'test',
            ]);

            // echo "<pre>";
            // print_r($charge);die();

            if ($charge['status'] == 'succeeded') {
                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->address_id = $request->address;
                $order->price = $request->total_price;
                $order->total_quantity = $request->total_quantity;
                $order->order_number = Str::random(4).time();
                $order->save();

                foreach ($carts as $key => $cart)
                {
                    $getProduct = Product::find($cart['product']['id']);

                    $order_details = new OrderDetail;
                    $order_details->order_id = $order->id;   
                    $order_details->product_id = $cart['product']['id'];
                    $order_details->product_quantity = $cart['quantity'];
                    $order_details->product_price = $cart['product']['price'];
                    $order_details->save();

                    if((int)$getProduct->quantity != 0)
                    {
                        $productUpdate = Product::where('id', $cart['product']['id'])
                        ->decrement('quantity' , $cart['quantity']);
                    }
                }

                $payment = new Payment;
                $payment->user_id = Auth::user()->id;
                $payment->order_id = $order->id;
                $payment->charge_id = $charge['id'];
                $payment->transaction_id = $charge['balance_transaction'];
                $payment->save();

                Cart::where('user_id', Auth::user()->id)->delete();

                DB::commit();
            }
        }
        catch (\Throwable $e)
        {
            DB::rollback();
            throw $e;
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('buyer.index')->with('success', 'Order placed successfully.');
    }
    
    public function delete_followers($id)
    {
        $id = Crypt::decrypt($id);
        $follower = UserFollowers::find($id);
        if($follower->delete())
        {
            return redirect()->route('buyer.followers')->with('success', 'Follower removed successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    // Buyer New Address
    public function address(Request $request)
    {
        $address = New Address;
        $address->user_id = Auth::user()->id;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->pincode = $request->pincode;
        $address->address = $request->address;
        if($address->save()){
            $response["status"] = 1;
            $response["message"] = "New address added successfully";
        }else{
            $response["status"] = 0;
            $response["message"] = "Something went wrong";
        }
        return response()->json($response);
    }
}
