<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserPost;
use App\Models\UserOffer;
use App\Models\User;
use App\Models\Page;
use App\Models\UserRole;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\UsedCoupon;
use App\Models\UserFollowers;
use App\Models\ProductWishlist;
use App\Models\ProductFavourite;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use Auth, Validator, Hash;

class LandingController extends Controller
{


    public function home(Request $request)
    {
        $user_posts = UserPost::with('getUserPostFile', 'getUser', 'getPostLike')->latest()->get();
        
        // echo "<pre>";
        // print_r($user_posts);die();
        $request->request->add(['limit' => 6]);
        $latestProducts = Product::getLatestProducts($request);
        $request->request->add(['limit' => 3]);
        $sellers = User::getSellers($request);
        // echo "<pre>"; print_r($latestProducts); die;
        return view('common.home', compact('latestProducts', 'sellers', 'user_posts'));
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

                if(Auth::user()->status==0){
                    Auth::logout();
                    return redirect()->back()->with('error', 'You account is deactivate please connect with support team.');
                }

                if (Auth::user()->user_type == 4) {
                    if($postData['previous_url']){
                        return Redirect::to(''.$postData['previous_url'].'')->with('success', "Logged in successfully");
                    }else{
                        return redirect()->route('buyer.index')->with('success', "Logged in successfully");   
                    }
                }else if (Auth::user()->user_type == 1) {
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
            $pro_sellers = User::where(['user_type'=>3])->get();
            $categories = ProductCategory::get();

            return view('guest.profile', compact('user','followers','followings','pro_sellers','categories'));
        } else {
            return redirect()->back()
            ->with('error', 'No buyer account')
            ->withInput();
        }
    }

    public function proSeller(Request $request,$id)
    {
        $user = User::where(['id'=>$id,'user_type'=>3])->first();
        if (!empty($user)) {
            $followers = UserFollowers::where(['follower_id'=>$id])->count();
            $followings = UserFollowers::where(['user_id'=>$id])->count();
            $pro_sellers = User::where(['user_type'=>3])->get();
            $categories = ProductCategory::get();

            return view('guest.pro_seller', compact('user','followers','followings','pro_sellers','categories'));
        } else {
            return redirect()->back()
            ->with('error', 'No sellet account')
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

    public function removeFollowUser(Request $request)
    {
        if(!Auth::check()){
            $response["status"] = 0;
            $response["message"] = "Please login first";
        }else{
            $postData = $request->all();
            $check = UserFollowers::where(['user_id'=> Auth::user()->id,'follower_id'=>$postData['user_id']])->first();
            if(!empty($check)){
                $follow = UserFollowers::where(['user_id'=> Auth::user()->id,'follower_id'=>$postData['user_id']])->delete();
                $response["status"] = 1;
                $response["message"] = "You have unfollow successfully";
            }else{
                $response["status"] = 0;
                $response["message"] = "You have not follow";
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

    public function carts(Request $request)
    {
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

        // if(!Auth::check()){
        //     return redirect()->route('signin')->with('error', 'Please login first');
        // }

        $carts = Cart::with('product')->where($userId)
        ->get()
        ->toArray();

        if(count($carts) > 0)
        {
            foreach ($carts as $key => $cart)
            {
                if($cart) {
                    $carts[$key]['p_price'] = $cart['product']['price'];
                    $carts[$key]['p_total_price'] = $cart['product']['price'] * $cart['quantity'];
                    $carts[$key]['p_ids'] = $cart['product']['id'];
                    
                    $checkOffer = UserOffer::where(['product_id' => $cart['product_id'], 'offer_used' => SELLER_GIVE_OFFER])
                    ->where($userId)
                    ->first();
                    
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

        $product_ids = array_column($carts, 'p_ids');
        
        $recent_products = Product::with('product_image')->whereNotIn('id', $product_ids)->latest()->take(4)->get()->toArray();

        $apply_coupon = UsedCoupon::with('coupon')->where(['user_id' => $id,'is_completed' => 0])->latest()->first();
         
        $get_offer_amount = array_column($carts, 'product_offer');
        $total_offer = array_sum($get_offer_amount);

        // echo "<pre>";
        // print_r($carts);die();

        return view('buyer.cart', compact('carts', 'total_price', 'recent_products', 'apply_coupon', 'total_offer'));
    }

    public function increaseOrDecreaseCart(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $cart->quantity = $request->quantity;
        if($cart->save())
        {
            $product = Product::find($cart->product_id);
            $product_price = $product->price;

            $p_total_price = $cart->quantity * $product_price;
            $response["status"] = 1;
            $response["p_total_price"] = $p_total_price;
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

    // public function addToCart(Request $request)
    // {
    //     if(!Auth::check()){
    //         // $response["status"] = 0;
    //         // $response["message"] = "Please login first";
    //         ob_start(); // Turn on output buffering
    //         system('ipconfig /all');
    //         $mycom = ob_get_contents();
    //         ob_clean();
    //         $findme = "Physical";
    //         $pmac = strpos($mycom, $findme);
    //         $mac = substr($mycom,($pmac+36),17); 
    //         echo $mac;die('test');
    //     }else{
    //         $postData = $request->all();

    //         $product = Product::find($postData['product_id']);

    //         $check = Cart::where(['user_id'=> Auth::user()->id,'product_id'=>$postData['product_id']])->first();

    //         if($product->quantity == 0)
    //         {
    //             $response["status"] = 0;
    //             $response["message"] = "Product quantity is zero";
    //             return response()->json($response);
    //         }

    //         if(empty($check)){
    //             $cart = new Cart;
    //             $cart->user_id = Auth::user()->id;
    //             $cart->product_id = $postData['product_id'];
    //             $cart->quantity = isset($postData['quantity']) ? $postData['quantity'] : 1;
    //             if($cart->save()){
    //                 $cartCount = Cart::where('user_id', Auth::user()->id)->count();
    //                 $response["cart_count"] = $cartCount;
    //                 $response["status"] = 1;
    //                 $response["message"] = "Add to cart successfully";
    //             }else{
    //                 $response["status"] = 0;
    //                 $response["message"] = "Something went wrong";
    //             }
    //         }else{

    //             if($check->quantity >= $product->quantity)
    //             {
    //                 $response["status"] = 0;
    //                 $response["message"] = "Product quantity is low";
    //                 return response()->json($response);
    //             }

    //             $cart = Cart::find($check->id);
    //             $cart->quantity = $check->quantity + 1;
    //             if($cart->save()){
                    
    //                 $response["status"] = 1;
    //                 $response["message"] = "Add to cart successfully";
    //             }else{
    //                 $response["status"] = 0;
    //                 $response["message"] = "Something went wrong";
    //             }
    //         }
    //     }
    //     return response()->json($response);
    // }

    public function addToCart(Request $request)
    {
        ob_start(); // Turn on output buffering
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();
        $findme = "Physical";
        $pmac = strpos($mycom, $findme);
        $mac = substr($mycom,($pmac+36),17); 
        

        if(!Auth::check())
        {
            $id = $mac;
            $userId = ['physical_address' => $id];
        }
        else
        {
            $id = Auth::user()->id;
            $userId = ['user_id' => $id];
        }

            $postData = $request->all();

            $product = Product::find($postData['product_id']);

            $check = Cart::where(['product_id'=>$postData['product_id']])
            ->where($userId)
            ->first();

            if($product->quantity == 0)
            {
                $response["status"] = 0;
                $response["message"] = "Product quantity is zero";
                return response()->json($response);
            }

            if(empty($check)){
                $cart = new Cart;
                
                if(Auth::check())
                {
                    $cart->user_id = Auth::user()->id;
                }
                else
                {
                    $cart->user_id = NULL;
                    $cart->physical_address = $mac;
                }

                $cart->product_id = $postData['product_id'];
                $cart->quantity = isset($postData['quantity']) ? $postData['quantity'] : 1;
                if($cart->save()){
                    $cartCount = Cart::where($userId)->count();
                    $response["cart_count"] = $cartCount;
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
        
        return response()->json($response);
    }

    public function buyNow($product_id)
    {
        ob_start(); // Turn on output buffering
        system('ipconfig /all');
        $mycom = ob_get_contents();
        ob_clean();
        $findme = "Physical";
        $pmac = strpos($mycom, $findme);
        $mac = substr($mycom,($pmac+36),17); 
        

        if(!Auth::check())
        {
            $id = $mac;
            $userId = ['physical_address' => $id];
        }
        else
        {
            $id = Auth::user()->id;
            $userId = ['user_id' => $id];
        }

        $product = Product::find($product_id);
        if($product->quantity == 0)
        {
            return redirect()->back()->with('error', "Product quantity is low");
        }

        $check = Cart::where($userId)->where(['product_id'=> $product_id])->first();

        if(empty($check))
        {
            $cart = new Cart;
            if(!Auth::check())
            {
                $cart->physical_address = $id;
            } else {
                $cart->user_id = $id;
            }
            $cart->product_id = $product_id;
            $cart->quantity = 1;
            $cart->save();
        }
        else
        {
            $cart = Cart::find($check->id);
            $cart->quantity = $check->quantity + 1;
            if($cart->save())
            {
                if($check->quantity >= $product->quantity)
                {
                    return redirect()->back()->with('error', "Product quantity is low");
                }
            }
        }

        return redirect()->route('carts');
    }

    public function removeCart($cart_id)
    {
        $cart = Cart::find($cart_id);
        if($cart->delete())
        {
            $response["status"] = 1;
            $response["message"] = "Cart remove successfully";
        }else{
            $response["status"] = 0;
            $response["message"] = "Something went wrong";
        }

        return response()->json($response);
    }

    public function removeAllCart(Request $request)
    {
        $cart = Cart::whereIn('id',$request->deleteids_arr)->delete();
        $response["status"] = 1;
        $response["message"] = "Cart remove successfully";
        return response()->json($response);
    }

    public function viewPage($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('page', compact('page'));
    }

    public function viewOrder($orderNumber)
    {
        if(Auth::check())
        {
            $order = Order::with('getOrderDetail.getProductDetails', 'getUserAddress.getUserDetail')->where('order_number', $orderNumber)->first();
        }
        else
        {
            $order = Order::with('getOrderDetail.getProductDetails', 'getGuestUserDetail')->where('order_number', $orderNumber)->first();            
        }

        return view('orderDetail', compact('order'));
    }

    public function saveToLaterCart($cart_id)
    {
        $cart = Cart::find($cart_id);
        if($cart->delete())
        {
            $check = ProductFavourite::where(['user_id'=> Auth::user()->id,'product_id'=>$cart->product_id])->first();
            if(empty($check)){
                $favourite                = new ProductFavourite;
                $favourite->user_id       = Auth::user()->id;
                $favourite->product_id    = $cart->product_id;
                if($favourite->save()){
                    //$response["status"] = 1;
                    //$response["message"] = "You have favourite successfully";
                }
            }

            $response["status"] = 1;
            $response["message"] = "Item save for later successfully";
        }else{
            $response["status"] = 0;
            $response["message"] = "Something went wrong";
        }

        return response()->json($response);
    }

    public function applyCoupon(Request $request)
     {
         if(!Auth::check())
         {
            $user_id = 0;
         }else{
            $user_id = Auth::user()->id;
         }

         $check_coupon = Coupon::where(['name' => $request->coupon_code,'status' => 1])->first();
         if($check_coupon){
             $coupon = New UsedCoupon;
             $coupon->user_id = $user_id;
             $coupon->coupon_id = $check_coupon->id;
             $coupon->name = $request->coupon_code;
             if($coupon->save()){
                 $response["status"] = 1;
                 $response["message"] = "Coupon apply successfully";
             }else{
                 $response["status"] = 0;
                 $response["message"] = "Something went wrong";
             }
         }else{
             $response["status"] = 0;
             $response["message"] = "Invalid coupon code!";
         }
         return response()->json($response);
     }

     public function removeCoupon(Request $request)
     {
        $used_coupon = UsedCoupon::find($request->coupon_id);
        if($used_coupon){
            if($used_coupon->delete())
            {
                $response["status"] = 1;
                $response["message"] = "Coupon has been remove successfully";
            }else{
                $response["status"] = 0;
                $response["message"] = "Something went wrong";
            }
        }else{
            $response["status"] = 0;
            $response["message"] = "Invalid coupon code!";
        }
        return response()->json($response);
     }
}