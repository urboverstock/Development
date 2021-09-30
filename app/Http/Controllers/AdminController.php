<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\ProductCategory;
use App\Models\ProductCompanies;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\UserFollowers;
use Auth, Validator, DB, Redirect;

class AdminController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function dashboard(Request $request)
    {
      if(!Auth::check()){
        return redirect()->route('signin')->with('error', 'You need to login first');
      }
      $products = Product::with('category:id,name',
    						 'user:id,first_name')
                ->where('status', ACTIVE_STATUS)->orderBy('id', 'DESC')->get();
      $products = $products->toArray();  
      //echo "<pre>";print_r($products);die;       
      return view('admin.dashboard', compact('products'));
    }

    public function buyers(Request $request)
    {
      $buyers = User::with(['role' => function($q) {
        $q->select('id', 'name');
        $q->where('name', 'Customer');
        }])
        ->wherehas('role', function($q) {
            $q->where('name', 'Customer');
        })->orderBy('id', 'DESC')->get();
      $buyers = $buyers->toArray();
      return view('admin.buyers.list', compact('buyers'));
    }

    public function sellers(Request $request)
    {
      $sellers = User::with(['role' => function($q) {
        $q->select('id', 'name');
        $q->where('name', 'Seller');
        }])
        ->wherehas('role', function($q) {
            $q->where('name', 'Seller');
        })->orderBy('id', 'DESC')->get();
      $sellers = $sellers->toArray();
      return view('admin.sellers.list', compact('sellers'));
    }

    public function add_product(Request $request)
    {
      $product_categories = ProductCategory::all();
      $product_companies = ProductCompanies::all();

      if($request->isMethod('post')){
        //echo $request->name;die;
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'brand' => 'required',
            'name' => 'required|unique:products,name,NULL,id,deleted_at,NULL',
            'sku' => 'unique:products,sku,NULL,id,deleted_at,NULL',
            'price' => 'required|digits_between:1,10',
            // 'gender' => 'required|in:M,F',
            // 'company_id' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            //'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        $product                = new Product;
        $product->user_id       = Auth::id();
        $product->name          = $request->name;
        $product->description   = $request->description;
        $product->price         = $request->price;
        // $product->status        = '1';
        // $product->gender        = $request['gender'];
        $product->category_id   = $request->category_id;
        // $product->company_id    = $request['company_id'];
        $product->brand    = $request->brand;
        $product->compare_price    = $request->compare_price;
        $product->cost_per_price    = $request->cost_per_price;

        $slug = \Str::slug($request->name);
        $count = Product::whereRaw("sku RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        $product->sku    = $slug;
        $product->charge_tax    = $request->charge_tax;
        $product->track_quantity    = $request->track_quantity;
        $product->continue_selling    = $request->continue_selling;
        $product->quantity    = $request->quantity;
        $product->tags    = $request->tags;
        
        if($product->save()){

            if(isset($request['image']) && !empty($request['image'])){

                $files = $request->image;
                if (count($files)) {
                    foreach ($files as $key => $file) {
                        $extension = $file->getClientOriginalExtension();
                        $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                        
                        $file->move($destinationPath, $picture);
                        $image = new ProductImage;
                        $image->product_id = $product->id;
                        $image->file = $this->uploadImagePath . '/' .$picture;
                        $image->file_type = 'I';
                        $image->status = '1';
                        $image->save();
                    }
                }
            }

            return redirect()->route('admin.dashboard')->with('success', 'Product added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
      }

      return view('admin.products.add', compact('product_categories','product_companies'));
    }

    public function buyerStatusUpdate($id, $status)
    {
      if($id && $status) {
          $user = User::find(base64_decode($id));
          $user->status = base64_decode($status);
          if($user->save()) {
            if(base64_decode($status) == 1) {
                if($user->user_type == 3) {
                  return redirect::back()->with('success', 'Account has been activated successfully');
                } else {
                  return redirect::back()->with('success', 'Account has been activated successfully');
                }
            } else {
                if($user->user_type == 3) {
                  return redirect::back()->with('success', 'Account has been deactivated successfully.');
                } else {
                  return redirect::back()->with('success', 'Account has been deactivated successfully.');
                }
            }
          }
      }
      return redirect::back()->with('error', 'Failed to update user account status.');
    }
}
