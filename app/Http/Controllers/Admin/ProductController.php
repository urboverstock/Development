<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\ProductCategory;
use App\Models\ProductCompanies;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductWishlist;
use Auth, Validator;
use App\Models\Notification;
use App\Models\UserOffer;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public $uploadImagePath = '/assets/images/products';

    //Add product form and save to the table
    public function addProduct(Request $request){

        // print_r($request->all());die();
        $product_categories = ProductCategory::all();
        $product_companies = ProductCompanies::all();

        if($request->isMethod('post')){

            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'brand' => 'required',
                // 'name' => 'required|unique:products,name,NULL,id,deleted_at,NULL',
                'name' => 'required',
                'sku' => 'unique:products,sku,NULL,id,deleted_at,NULL',
                'price' => 'required|digits_between:1,10',
                // 'gender' => 'required|in:M,F',
                // 'company_id' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                // 'image' => 'required|mimes:jpg,jpeg,png'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $extensions = $request->extension;

            if(isset($extensions))
            {
                foreach ($extensions as $key => $value) {
                // print_r($value);die();
                    if($value != 'jpg' && $value != 'jpeg' && $value != 'png')
                    {
                        return redirect()->back()->with('error', 'The image file must be jpg, jpeg, png');
                    }
                }
            }

            $product                = new Product;
            $product->user_id       = $request->user_id;
            $product->name          = $request->name;
            $product->description   = $request->description;
            $product->price         = $request->price;
            $product->status        = $request->status;
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
                        #foreach ($files as $key => $file) {
                        #    $extension = $file->getClientOriginalExtension();
                        #    $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        #    $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                            
                        #    $file->move($destinationPath, $picture);
                        #    $image = new ProductImage;
                        #    $image->product_id = $product->id;
                        #    $image->file = $this->uploadImagePath . '/' .$picture;
                        #    $image->file_type = 'I';
                        #    $image->status = '1';
                        #    $image->save();
                        #}

                        foreach ($files as $key => $file) {
                            $picture = $file.'.png';

                            $image = file_get_contents($file);

                            $fileName = uniqid() . date('YmdHis') . '.png';

                            file_put_contents( 'assets/images/products/'.$fileName, $image);
                            $image = new ProductImage;
                            $image->product_id = $product->id;
                            $image->file = '/assets/images/products/'.$fileName;
                            $image->file_type = 'I';
                            $image->status = '1';
                            $image->save();
                        }
                    }
                }
                
                return redirect()->route('admin.products')->with('success', 'Product added successfully');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        $sellers = User::with(['role' => function($q) {
            $q->select('id', 'name');
            $q->where('name', 'Seller');
            }])
            ->wherehas('role', function($q) {
                $q->where('name', 'Seller');
            })->orderBy('id', 'DESC')->get();

        return view('admin.products.add_product', compact('product_categories','product_companies','sellers'));
    }

    //Edit product form and update to the table
    public function editProduct(Request $request, $product_id)
    {
        $product_categories = ProductCategory::all();
        $product_companies = ProductCompanies::all();
        $product = Product::where('id', $product_id)
        ->with('product_image')
        ->first();

        // print_r($product);die();

        if($request->isMethod('post')){

            $postData = $request->all();

            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'brand' => 'required',
                // 'name' => 'required|unique:products,name,NULL,id,deleted_at,'.$product_id,
                'name' => 'required',
                'sku' => 'unique:products,sku,NULL,id,deleted_at,'.$product_id,
                'price' => 'required|digits_between:1,10',
                // 'gender' => 'required|in:M,F',
                // 'company_id' => 'required',
                'description' => 'required',                
                'quantity' => 'required',
                // 'image' => 'mimes:jpg,jpeg,png'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $extensions = $request->extension;

            if(isset($extensions))
            {
                foreach ($extensions as $key => $value) {
                // print_r($value);die();
                    if($value != 'jpg' && $value != 'jpeg' && $value != 'png')
                    {
                        return redirect()->back()->with('error', 'The image file must be jpg, jpeg, png');
                    }
                }
            }

            // $checkExists = Product::where(['name' => $request->name, 'user_id' => Auth::user()->id])
            // ->where('brand', $request->brand)
            // ->where('id', '!=', $product_id)
            // ->first();
   
            // if ($checkExists) {
            //     return Redirect()->back()->withinput()->with('error', 'Category Already Exists.');
            // }

            $product = Product::find($product_id);

            if(empty($product)){
                return redirect()->back()->with('error', COMMON_ERROR);
            }

            $product->user_id       = $request->user_id;
            $product->name          = $request->name;
            $product->description   = $request->description;
            $product->price         = $request->price;
            // $product->gender        = $request->gender;
            $product->category_id   = $request->category_id;
            // $product->company_id    = $request->company_id;
            $product->brand    = $request->brand;
            $product->compare_price    = $request->compare_price;
            $product->cost_per_price    = $request->cost_per_price;
            $product->status        = $request->status;
            
            if($product->sku != '')
            {
                $slug = $product->sku;
            }
            else
            {
                $slug = \Str::slug($request->name);
                $count = Product::whereRaw("sku RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                $slug = $count ? "{$slug}-{$count}" : $slug;
            }
            

            $product->sku    = $slug;
            $product->charge_tax    = $request->charge_tax;
            $product->track_quantity    = $request->track_quantity;
            $product->continue_selling    = $request->continue_selling;
            $product->quantity    = $request->quantity;
            $product->tags    = $request->tags;
            // print_r($product);die();
            if($product->save()){

                if(isset($request['image']) && !empty($request['image'])){

                    $files = $request->image;
                    if (count($files)) {
                        #foreach ($files as $key => $file) {
                        #    $extension = $file->getClientOriginalExtension();
                        #    $picture = uniqid() . date('YmdHis') . '.' . $extension;
                        #    $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                            
                        #    $file->move($destinationPath, $picture);
                        #    $image = new ProductImage;
                        #    $image->product_id = $product->id;
                        #    $image->file = $this->uploadImagePath . '/' .$picture;
                        #    $image->file_type    = 'I';
                        #    $image->status = '1';
                        #    $image->save();
                        #}

                        foreach ($files as $key => $file) {
                            // $extension = $file->getClientOriginalExtension();
                            // $picture = uniqid() . date('YmdHis') . '.' . $extension;
                            // $destinationPath = base_path() . '/public'.$this->uploadImagePath;
                            
                            // $file->move($destinationPath, $picture);
                            $picture = $file.'.png';

                            $image = file_get_contents($file);

                            $fileName = uniqid() . date('YmdHis') . '.png';

                            file_put_contents( 'assets/images/products/'.$fileName, $image);
                            $image = new ProductImage;
                            $image->product_id = $product->id;
                            $image->file = '/assets/images/products/'.$fileName;
                            $image->file_type    = 'I';
                            $image->status = '1';
                            $image->save();
                        }
                    }
                }
                
                return redirect()->route('admin.products')->with('success', 'Product updated successfully');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        $sellers = User::with(['role' => function($q) {
            $q->select('id', 'name');
            $q->where('name', 'Seller');
            }])
            ->wherehas('role', function($q) {
                $q->where('name', 'Seller');
            })->orderBy('id', 'DESC')->get();

        return view('admin.products.add_product', compact('product_categories','product_companies','product','sellers'));
    }

    //view particular product details
    public function viewProduct($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::with('product_image', 'category')->find($id);
        return view('admin.products.viewProduct', compact('product'));
    }

    //Delete particular product image
    public function deleteImage($id)
    {
        $productImage = ProductImage::find($id);
        // print_r($productImage);die();
        if($productImage->delete())
        {
            return back()->with('success', 'Image deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

}
