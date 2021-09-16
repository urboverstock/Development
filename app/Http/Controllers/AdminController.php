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
use Auth, Validator, DB;

class AdminController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function dashboard(Request $request)
    {
      if(!Auth::check()){
        return redirect()->route('signin')->with('error', 'You need to login first');
      }
      return view('admin.dashboard');
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
        echo $request->name;die;
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

            return redirect()->route('sellerView_profile')->with('success', 'Product added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
      }

      return view('admin.products.add', compact('product_categories','product_companies'));
    }
}
