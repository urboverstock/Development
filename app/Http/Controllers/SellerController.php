<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\ProductCategory;
use App\Models\ProductCompanies;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductWishlist;
use Auth, Validator;
use App\Models\Order;

class SellerController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function dashboard(Request $request)
    {

        if(!Auth::check())
        {
            return redirect()->route('signin')->with('error', 'You need to login first');
        }

        $total_orders = Order::where('user_id', Auth::user()->id)->count();
        $total_pending_order = Order::where('user_id', Auth::user()->id)->where('status', ORDER_PENDING)->count();
        $total_complete_order = Order::where('user_id', Auth::user()->id)->where('status', ORDER_COMPLETED)->count();
        $total_price_order = Order::where('user_id', Auth::user()->id)->where('status', ORDER_COMPLETED)->sum('price');

        $order_chart = [];
        $final_result = [];

        $order_By_month = Order::select(\DB::raw('count(id) as `orderCount`'), \DB::raw("DATE_FORMAT(created_at, '%M') month"))
            ->where('user_id', Auth::user()->id)
            ->groupBy('month')
            ->get()
            ->toArray();

        $key = array_column($order_By_month, 'month');
        $val = array_column($order_By_month, 'orderCount');
        $order_By_month = array_combine($key, $val);
        $months = array("January", "February", "March", 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        foreach ($months as $month) {
            if (array_key_exists($month, $order_By_month)) {
                $result = $order_By_month[$month];
            } else {
                $result = 0;
            }
            $final_result[] = $result;
        }
        foreach ($order_By_month as $key => $val) {
            $order_By_month[$key] = $val['data'];
        }
        $data['order_By_month'] = $final_result;

        $order_chart = Order::select('status as name', \DB::raw('count(*) as y'))
            ->where('user_id', Auth::user()->id)
            ->groupBy('status')
            ->get()
            ->toArray();


        foreach ($order_chart as $key => $val) {
            $order_chart[$key]['name'] = getOrderStatusName($val['name']);
            $order_chart[$key]['y'] = $val['y'];
        }

        // echo "<pre>";
        // print_r($order_chart);die();

        $data['order_chart'] = $order_chart;

        $productId = Product::where('user_id', Auth::user()->id)->get()->pluck('id')->toArray();
        $data['wishlists'] = ProductWishlist::with(['getUserDetail' => function($q)
            {
                $q->select('id', 'first_name', 'profile_pic', 'last_name');
            }])
            ->with(['getProductDetail' => function($q)
            {
                $q->select('id', 'name');
            }])
            ->whereIn('product_id', $productId)->latest()->paginate(10);

        return view('seller.dashboard', compact('total_complete_order', 'total_pending_order', 'total_price_order', 'total_orders', 'data'));
    }

    public function edit_profile(Request $request){

        $user = User::find(Auth::user()->id);
        // print_r($user);die();
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
            $user->user_chat_status = isset($postData['user_chat_status']) ? 1 : 0;
            // print_r($user);die();

            if(isset($postData['profile_pic']) && !empty($postData['profile_pic'])){
                $user->profile_pic = UploadImage($postData['profile_pic'], $this->uploadUserProfilePath);
            }

            if($user->save()){
                return redirect()->route('sellerEdit_profile_documents');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        return view('seller.edit_profile', compact('user'));
    }

    public function edit_profile_documents(Request $request){

        $user = User::where('id', Auth::user()->id)
        ->first();

        $doc_1 = UserDocument::where('user_id', $user->id)
        ->where('type', '1')
        ->first();
        $doc_2 = UserDocument::where('user_id', $user->id)
        ->where('type', '2')
        ->first();

        $doc_3 = UserDocument::where('user_id', $user->id)
        ->where('type', '3')
        ->first();

        if($request->isMethod('post')){
            $postData = $request->all();
            // echo "<pre>"; print_r($postData); die;

            if(isset($postData['doc_1']) && !empty($postData['doc_1'])){
                if(empty($doc_1)){
                    $doc_1          = new UserDocument;
                    $doc_1->user_id = $user->id;
                    $doc_1->type    = '1';
                }

                $doc_1->document = UploadImage($postData['doc_1'], $this->uploadUserProfilePath);
                $doc_1->doc_original_name = $postData['doc_1']->getClientOriginalName();
                $doc_1->save();
            }

            if(isset($postData['doc_2']) && !empty($postData['doc_2'])){
                if(empty($doc_2)){
                    $doc_2          = new UserDocument;
                    $doc_2->user_id = $user->id;
                    $doc_2->type    = '2';
                }

                $doc_2->document = UploadImage($postData['doc_2'], $this->uploadUserProfilePath);
                $doc_2->doc_original_name = $postData['doc_2']->getClientOriginalName();
                $doc_2->save();
            }

            if(isset($postData['doc_3']) && !empty($postData['doc_3'])){
                if(empty($doc_3)){
                    $doc_3          = new UserDocument;
                    $doc_3->user_id = $user->id;
                    $doc_3->type    = '3';
                }

                $doc_3->document = UploadImage($postData['doc_3'], $this->uploadUserProfilePath);
                $doc_3->doc_original_name = $postData['doc_3']->getClientOriginalName();
                $doc_3->save();
            }

            return redirect()->route('sellerDashboard')->with('success', 'Profile updated successfully');
        }

        return view('seller.edit_profile_documents', compact('user', 'doc_1', 'doc_2', 'doc_3'));
    }

    public function view_profile(){

        $user = User::where('id', Auth::id())
        ->with('products.product_image')
        ->first();

        if(!empty($user)){
            $user = $user->toArray();
        }
        // echo "<pre>"; print_r($user); die;

        return view('seller.view_profile', compact('user'));
    }

    public function add_product(Request $request){

        $product_categories = ProductCategory::all();
        $product_companies = ProductCompanies::all();

        if($request->isMethod('post')){

            $postData = $request->all();

            $validator = Validator::make($postData, [
                'name' => 'required',
                'price' => 'required|digits_between:1,10',
                'gender' => 'required|in:M,F',
                'category_id' => 'required',
                'company_id' => 'required',
                'description' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $product                = new Product;
            $product->user_id       = Auth::id();
            $product->name          = $postData['name'];
            $product->description   = $postData['description'];
            $product->price         = $postData['price'];
            $product->status        = '1';
            $product->gender        = $postData['gender'];
            $product->category_id   = $postData['category_id'];
            $product->company_id    = $postData['company_id'];

            if($product->save()){

                if(isset($postData['image']) && !empty($postData['image'])){
                    if(empty($image)){
                        $image          = new ProductImage;
                        $image->product_id = $product->id;
                        $image->file_type    = 'I';
                    }

                    $image->file = UploadImage($postData['image'], $this->uploadUserProfilePath);
                    $image->status = '1';
                    $image->save();
                }

                return redirect()->route('sellerView_profile')->with('success', 'Product added successfully');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        return view('seller.add_product', compact('product_categories','product_companies'));
    }

    public function edit_product(Request $request, $product_id){

        $product_categories = ProductCategory::all();
        $product_companies = ProductCompanies::all();
        $product = Product::where('id', $product_id)
        ->with('product_image')
        ->first();
        // echo "<pre>"; print_r($product); die;

        if($request->isMethod('post')){

            $postData = $request->all();

            $validator = Validator::make($postData, [
                'name' => 'required',
                'price' => 'required|digits_between:1,10',
                'gender' => 'required|in:M,F',
                'category_id' => 'required',
                'company_id' => 'required',
                'description' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $product = Product::find($product_id);

            if(empty($product)){
                return redirect()->back()->with('error', COMMON_ERROR);
            }

            $product->user_id       = Auth::id();
            $product->name          = $postData['name'];
            $product->description   = $postData['description'];
            $product->price         = $postData['price'];
            $product->status        = '1';
            $product->gender        = $postData['gender'];
            $product->category_id   = $postData['category_id'];
            $product->company_id    = $postData['company_id'];

            if($product->save()){

                if(isset($postData['image']) && !empty($postData['image'])){

                    ProductImage::where('product_id', $product->id)
                    ->delete();

                    if(empty($image)){
                        $image          = new ProductImage;
                        $image->product_id = $product->id;
                        $image->file_type    = 'I';
                    }

                    $image->file = UploadImage($postData['image'], $this->uploadUserProfilePath);
                    $image->status = '1';
                    $image->save();
                }

                return redirect()->route('sellerView_profile')->with('success', 'Product updated successfully');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        return view('seller.add_product', compact('product_categories','product_companies','product'));
    }
}
