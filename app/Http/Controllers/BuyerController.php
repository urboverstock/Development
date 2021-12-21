<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestUser;
use App\Models\UserPost;
use App\Models\UserOffer;
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
use App\Models\ProductWishlist;
use App\Models\ProductFavourite;
use App\Models\Chat;
use App\Models\Cart;
use App\Models\UsedCoupon;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreStripeRequest;
use Auth, Validator, DB, Session;
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
        //echo "<pre>"; print_r($sellers->toArray()); die;

        foreach ($sellers as $key => $seller){
            if(Auth::check()){
                $followers = UserFollowers::where(['user_id'=>Auth::user()->id,'follower_id'=>$seller->id])->count();
                if($followers){
                    $seller->is_follow = 1; 
                }else{
                    $seller->is_follow = 0;
                }
            }else{
                $seller->is_follow = 0;
            }
        }
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
      $total_item_order = Order::where('user_id', Auth::user()->id)->count();
      $total_item_favourite = ProductFavourite::where('user_id', Auth::user()->id)->count();
      //$total_item_favourite = ProductWishlist::where('user_id', Auth::user()->id)->count();
      $unread_msg_count = Chat::whereNull('read_at')->count();
      $total_pending_order = Order::where('user_id', Auth::user()->id)->where('status', ORDER_PENDING)->count();

      $orders_detail_product_id = OrderDetail::select('product_id')
      //->groupBy('product_id')
      ->where('user_id', Auth::user()->id)
      ->where('status', ORDER_COMPLETED)
      ->latest()
      ->get()
      ->pluck('product_id')
      ->toArray();

      $get_old_order_products = Product::whereIn('id', $orders_detail_product_id)->get()->toArray();
      // print_r($get_old_order_products);die();

      return view('buyer.dashboard', compact('user','followers','followings', 'total_item_order', 'total_item_favourite', 'unread_msg_count','total_pending_order', 'get_old_order_products'));
    }

    public function edit_profile(Request $request){

        $user = User::find(Auth::user()->id);

        if($request->isMethod('post')){
            $postData = $request->all();
            // print_r($postData);die();
            $validator = Validator::make($postData, [
                'first_name' => 'required',
                'last_name' => 'required',
                'isd_code' => 'required|digits_between:2,3',
                'phone_number' => 'required|digits:10,10',
                // 'email' => 'required|email|unique:users',
                'location' => 'required',
                'billing_address' => 'required',
                'about' => 'required',
                'profile_pic' => 'max:2048'
                // 'gender' => 'required'
            ],[
                'about.required' => 'The bio field is required',
                'profile_pic.max' => 'The :attribute failed to upload.'
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
                return redirect()->route('buyer.view_profile')->with('success', 'profile update successfully.');;
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

        $total_item_order = Order::where('user_id', Auth::user()->id)->count();
        $total_item_favourite = ProductFavourite::where('user_id', Auth::user()->id)->count();
        $unread_msg_count = Chat::whereNull('read_at')->count();
        $total_pending_order = Order::where('user_id', Auth::user()->id)->where('status', ORDER_PENDING)->count();
        // print_r($total_item_order);die();
        //echo "<pre>";print_r($get_followings);die;
        return view('buyer.show_followers', compact('user','followers','followings','get_followers','get_followings', 'total_item_order', 'total_item_favourite', 'unread_msg_count', 'total_pending_order'));
    }

    // Checkout functionality
    public function checkout()
    {
        if(!Auth::check())
        {
            $id = getPhysicalAddressOfPC();
            $userId = ['physical_address' => $id];
        }
        else
        {
            $user_id = Auth::user()->id;
            $userId = ['user_id' => $user_id];
        }

        
        $c_total_quantity = Cart::where($userId)->sum('quantity');
        $carts = Cart::with('product')->where($userId)->get()->toArray();
        
        if(Auth::check())
        {
            $addresses = Address::where('user_id', Auth::user()->id)->get()->toArray();
            $apply_coupon = UsedCoupon::with('coupon')->where(['user_id' => Auth::user()->id,'is_completed' => 0])->latest()->first();
        }
        else
        {
            $addresses = NULL;
            $apply_coupon = UsedCoupon::with('coupon')->where(['is_completed' => 0])->latest()->first();
        }

        if(count($carts) > 0)
        {
            foreach ($carts as $key => $cart)
            {
                if($cart) {
                    $carts[$key]['p_price'] = $cart['product']['price'];
                    $carts[$key]['p_total_price'] = $cart['product']['price'] * $cart['quantity'];

                    $checkOffer = UserOffer::where([ 'product_id' => $cart['product_id'], 'offer_used' => SELLER_GIVE_OFFER])
                    ->where($userId)->first();

                    if($checkOffer) {
                        $carts[$key]['product_offer'] = $checkOffer['offer_percentage'];
                        $carts[$key]['product_offer_description'] = $checkOffer['offer_description'];
                        $carts[$key]['product_offer_type'] = $checkOffer['offer_type'];

                    }
                }
            }
        }

        $p_total_price_column = array_column($carts, 'p_total_price');
        $total_price = array_sum($p_total_price_column);

        $get_offer_amount = array_column($carts, 'product_offer');
        $total_offer = array_sum($get_offer_amount);

        return view('buyer.checkout', compact('addresses', 'carts', 'c_total_quantity', 'total_price', 'apply_coupon', 'total_offer'));
    }

    public function payment(Request $request)
    {
        Session::put('guest_user_data', $request->all());
        return view('stripe.stripe', compact('request'));
    }

    // Save order in order and order details tables and also decrement the product table quantity
    public function saveOrder(StoreStripeRequest $request)
    {
        $guest_user = Session::get('guest_user_data');
        // print_r($guest_user['user_name']);die(); 

        if(!Auth::check())
        {
            $id = getPhysicalAddressOfPC();
            $userId = ['physical_address' => $id];
        }
        else
        {
            $id = Auth::user()->id;
            $userId = ['user_id' => $id];
        }

        $carts = Cart::with('product')->where($userId)->get()->toArray();


        DB::beginTransaction();
        try
        {
            Stripe\Stripe::setApiKey(Config::get('services.stripe.secret'));

            if(Auth::check())
            {
                $stripeToken = $request->stripeToken;
                $total_price = $request->total_price;
            }
            else
            {
                $stripeToken = $request->stripeToken;
                $total_price = $guest_user['total_price'];
            }
            

            $charge = Stripe\Charge::create([
                'source' => $stripeToken,
                'currency' => 'inr',
                'amount' => $total_price * 100,
                'description' => 'test',
            ]);

            // echo "<pre>";
            // print_r($charge);die();

            if ($charge['status'] == 'succeeded') {
                
                if(!Auth::check())
                {
                    $check_guest_user = GuestUser::where('email', $guest_user['user_email'])
                    ->orWhere('phone_number', $guest_user['user_email'])
                    ->first();

                    if(empty($check_guest_user))
                    {
                        $guest_user_data = new GuestUser;
                        $guest_user_data->name = $guest_user['user_name'];
                        $guest_user_data->email = $guest_user['user_email'];
                        $guest_user_data->phone_number = $guest_user['user_number'];
                        $guest_user_data->physical_address = getPhysicalAddressOfPC();
                        $guest_user_data->save();  
                    }
                    else
                    {
                        $guest_user_data = $check_guest_user;
                    }
                }
                

                $order = new Order;
                if(Auth::check())
                {
                    $order->user_id = Auth::user()->id;
                    $order->address_id = $request->address;
                }
                $order->price = $request->total_price;
                $order->total_quantity = $request->total_quantity;
                $order->discount = $request->total_offer;
                $order->order_number = Str::random(4).time();

                if(!Auth::check())
                {
                    $order->user_id = $guest_user_data->id;
                    $order->address = $guest_user['user_address'];
                    $order->country = $guest_user['user_country'];
                    $order->state = $guest_user['user_state'];
                    $order->city = $guest_user['user_city'];
                    $order->pincode = $guest_user['user_pincode'];
                }

                $order->save();

                foreach ($carts as $key => $cart)
                {
                    $getProduct = Product::find($cart['product']['id']);

                    $order_details = new OrderDetail;
                    $order_details->order_id = $order->id;
                    if(Auth::check())
                    {
                        $order_details->user_id = Auth::user()->id;
                    }
                    else
                    {
                        $order_details->user_id = $guest_user_data->id;   
                    }
                    $order_details->product_id = $cart['product']['id'];
                    $order_details->product_quantity = $cart['quantity'];
                    $order_details->product_price = $cart['product']['price'];
                    $order_details->save();

                    if(Auth::check())
                    {
                        $updateUserOffer = UserOffer::where(['user_id' => Auth::user()->id,
                        'product_id' => $cart['product']['id']])
                        ->update(['offer_used' => BUYER_USED_OFFER]);
                    }

                    if((int)$getProduct->quantity != 0)
                    {
                        $productUpdate = Product::where('id', $cart['product']['id'])
                        ->decrement('quantity' , $cart['quantity']);
                    }
                }

                $payment = new Payment;
                if(Auth::check())
                {
                    $payment->user_id = Auth::user()->id;
                }
                else
                {
                    $payment->user_id = $guest_user_data->id;   
                }
                $payment->order_id = $order->id;
                $payment->charge_id = $charge['id'];
                $payment->transaction_id = $charge['balance_transaction'];
                $payment->save();

                if(Auth::check())
                {
                    $data['email'] = Auth::user()->email;
                }
                else
                {
                    $data['email'] = $guest_user_data['email'];   
                }                

                
                $data['order_number'] = $order->order_number;
                $data['subject'] = 'Order';
                $data['layout'] = 'email_templates.newOrder';

                // $mail = emailSend($data);

                Cart::where($userId)->delete();

                DB::commit();
            }
        }
        catch (\Throwable $e)
        {
            DB::rollback();
            throw $e;
        }

        Cart::where($userId)->delete();

        // return redirect()->route('buyer.index')->with('success', 'Order placed successfully.');
        return redirect()->route('viewOrder', $order->order_number)->with('success', 'Order placed successfully.');
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
