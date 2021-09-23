<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Cart;
use App\Models\UserFollowers;
use App\Models\ProductWishlist;
use App\Models\ProductFavourite;
use Auth, Validator, Hash;

class LandingController extends Controller
{


    public function home(Request $request)
    {
        $request->request->add(['limit' => 6]);
        $latestProducts = Product::getLatestProducts($request);
        $request->request->add(['limit' => 3]);
        $sellers = User::getSellers($request);
        // echo "<pre>"; print_r($latestProducts); die;
        return view('common.home', compact('latestProducts', 'sellers'));
    }

    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $postData = $request->all();
            // echo "<pre>"; print_r($postData); die;

            $validator = Validator::make($postData, [
                'first_name' => 'required',
                'last_name' => 'required',
                'isd_code' => 'required|digits_between:2,3',
                'phone_number' => 'required|digits:10,10',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'location' => 'required',
                'gender' => 'required',
                'user_type' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $user                = new User;
            $user->first_name    = $postData['first_name'];
            $user->last_name     = $postData['last_name'];
            $user->isd_code      = $postData['isd_code'];
            $user->phone_number  = $postData['phone_number'];
            $user->email         = $postData['email'];
            $user->password      = Hash::make($postData['password']);
            $user->location      = $postData['location'];
            $user->gender        = $postData['gender'];
            $user->user_type     = $postData['user_type'];

            /* $checkUserRoleExistance = UserRole::whereRaw( 'LOWER(`name`) LIKE ?', 'Seller' )->first();

            $user_type = 3;
            if($checkUserRoleExistance)
            {
                $user_type = $checkUserRoleExistance->id;
            }

            $user->user_type        = $user_type; */

            if($user->save())
            {
                return redirect()->route('signin')->with('success', 'Account created successfully.');
            }
            else
            {
                return redirect()->back()
                ->with('error', 'Something went wrong')
                ->withInput();
            }

            // Auth::login($user);

            // return redirect()->route('sellerDashboard')->with('success', 'Account created successfully.');
        }

        return view('register');
    }

    public function signIn(Request $request)
    {
        if($request->isMethod('post')){
            $postData = $request->all();
            // echo "<pre>"; print_r($postData); die;

            $validator = Validator::make($postData, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $user = User::where('email', $postData['email'])
            ->first();

            if(empty($user)){
                return redirect()->back()->with('error', 'No account registered with this email');
            }

            if (Auth::attempt([
                'email' => $postData['email'],
                'password' => $postData['password']
            ])) {
                
                User::where('id', Auth::user()->id)->update(['login_status' => LOGIN]);

                if (Auth::user()->user_type == 4) {
                    return redirect()->route('buyer.dashboard')->with('success', "Logged in successfully");
                }else if (Auth::user()->user_type == 2) {
                    return redirect()->route('admin.dashboard')->with('success', "Logged in successfully");
                }else{
                    return redirect()->route('sellerDashboard')->with('success', "Logged in successfully");
                }
            } else {
                return redirect()->back()->with('error', 'Invalid email and password combination');
            }
        }

        return view('login');
    }


    public function forgot_password(Request $request)
    {
        if($request->isMethod('post')){
            $postData = $request->all();
            // echo "<pre>"; print_r($postData); die;

            $validator = Validator::make($postData, [
                'email' => 'required|email'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $user = User::where('email', $postData['email'])
            ->first();

            if (!empty($user)) {
                $postData['subject'] = "Reset Password";
                $postData['layout'] = 'email_templates.reset_password';
                $postData['new_password'] = rand();
                $user->password = Hash::make($postData['new_password']);
                $user->save();
                $mail = emailSend($postData);
                return redirect()->back()->with('success', 'Password reset email sent successfully');
            } else {
                return redirect()->back()
                ->with('error', 'No account registered with this email')
                ->withInput();
            }
        }

        return view('forgot_password');
    }

    public function logout()
    {
        User::where('id', Auth::user()->id)->update(['login_status' => LOGOUT]);
        Auth::logout();
        return redirect()->route('signin')->with('success', 'Logout successfully');
    }

    public function getStarted(Request $request)
    {
        return view('getstarted');
    }

    public function guestBuyer(Request $request,$id)
    {
        $user = User::where(['id'=>$id,'user_type'=>4])->first();
        if (!empty($user)) {
            $followers = UserFollowers::where(['follower_id'=>$id])->count();
            $followings = UserFollowers::where(['user_id'=>$id])->count();
            $pro_sellers = User::where(['user_type'=>1])->get();

            return view('guest.profile', compact('user','followers','followings','pro_sellers'));
        } else {
            return redirect()->back()
            ->with('error', 'No buyer account')
            ->withInput();
        }
    }

    public function proSeller(Request $request,$id)
    {
        $user = User::where(['id'=>$id,'user_type'=>1])->first();
        if (!empty($user)) {
            $followers = UserFollowers::where(['follower_id'=>$id])->count();
            $followings = UserFollowers::where(['user_id'=>$id])->count();
            $pro_sellers = User::where(['user_type'=>1])->get();
            return view('guest.pro_seller', compact('user','followers','followings','pro_sellers'));
        } else {
            return redirect()->back()
            ->with('error', 'No buyer account')
            ->withInput();
        }
    }

    public function addFollowUser(Request $request)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
        }else{
            $postData = $request->all();
            $check = UserFollowers::where(['user_id'=> Auth::user()->id,'follower_id'=>$postData['user_id']])->first();
            if(empty($check)){
                $follower                = new UserFollowers;
                $follower->user_id       = Auth::user()->id;
                $follower->follower_id     = $postData['user_id'];
                if($follower->save()){
                    $response["status"] = 1;
                    $response["message"] = "You have follow successfully";
                }else{
                    $response["status"] = 0;
                    $response["message"] = "Something went wrong";
                }
            }else{
                $response["status"] = 0;
                $response["message"] = "You have already follow";
            }
        }
        return response()->json($response);
    }

    public function addWishlistProduct(Request $request)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
        }else{
            $postData = $request->all();
            $check = ProductWishlist::where(['user_id'=> Auth::user()->id,'product_id'=>$postData['product_id']])->first();
            if(empty($check)){
                $wishlist                = new ProductWishlist;
                $wishlist->user_id       = Auth::user()->id;
                $wishlist->product_id    = $postData['product_id'];
                if($wishlist->save()){
                    $response["status"] = 1;
                    $response["message"] = "You have wishlist successfully";
                }else{
                    $response["status"] = 0;
                    $response["message"] = "Something went wrong";
                }
            }else{
                $response["status"] = 0;
                $response["message"] = "You have already wishlist";
            }
        }
        return response()->json($response);
    }

    public function addFavouriteProduct(Request $request)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
        }else{
            $postData = $request->all();
            $check = ProductFavourite::where(['user_id'=> Auth::user()->id,'product_id'=>$postData['product_id']])->first();
            if(empty($check)){
                $favourite                = new ProductFavourite;
                $favourite->user_id       = Auth::user()->id;
                $favourite->product_id    = $postData['product_id'];
                if($favourite->save()){
                    $response["status"] = 1;
                    $response["message"] = "You have favourite successfully";
                }else{
                    $response["status"] = 0;
                    $response["message"] = "Something went wrong";
                }
            }else{
                $response["status"] = 0;
                $response["message"] = "You have already favourite";
            }
        }
        return response()->json($response);
    }

    public function addToCart(Request $request)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
        }else{
            $postData = $request->all();

            $product = Product::find($postData['product_id']);

            $check = Cart::where(['user_id'=> Auth::user()->id,'product_id'=>$postData['product_id']])->first();

            if($product->quantity == 0)
            {
                $response["status"] = 0;
                $response["message"] = "Product quantity is zero";
                return response()->json($response);
            }

            if(empty($check)){
                $cart = new Cart;
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $postData['product_id'];
                $cart->quantity = isset($postData['quantity']) ? $postData['quantity'] : 1;
                if($cart->save()){
                    $response["status"] = 1;
                    $response["message"] = "Add to cart successfully";
                }else{
                    $response["status"] = 0;
                    $response["message"] = "Something went wrong";
                }
            }else{

                if($check->quantity >= $product->quantity)
                {
                    $response["status"] = 0;
                    $response["message"] = "Product quantity is low";
                    return response()->json($response);
                }

                $cart = Cart::find($check->id);
                $cart->quantity = $check->quantity + 1;
                if($cart->save()){
                    $response["status"] = 1;
                    $response["message"] = "Add to cart successfully";
                }else{
                    $response["status"] = 0;
                    $response["message"] = "Something went wrong";
                }
            }
        }
        return response()->json($response);
    }
}