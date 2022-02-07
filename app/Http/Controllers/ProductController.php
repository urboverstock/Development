<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\UserFollowers;
use App\Models\ProductView;
use Auth;

class ProductController extends Controller
{
    public function getStarted(Request $request)
    {
        if(Auth::check()){
            $login_id = Auth::user()->id;
        }else{
            $login_id = 0;
        }

        $request->request->add(['limit' => 8]);
        $request->request->add(['orderBy' => 'DESC']);
        $products = Product::getProducts($request);
        $sellers = User::getSellers($request);
        foreach($sellers as $key => $seller){
            $UserFollowers = UserFollowers::where(['user_id' => $login_id ,'follower_id' => $seller->id])->get();

            if (count($UserFollowers) > 0){
                $sellers[$key]['Follow_status'] = '1';
            }else{
                $sellers[$key]['Follow_status'] = '0';
            }
        }

        //echo "<pre>";print_r($sellers);die;
        return view('getstarted', compact('products','sellers'));
    }

    public function searchresults(Request $request)
    {
        $request->request->add(['limit' => 8]);
        $products = Product::getProducts($request);
        $brands = Product::select('brand')->whereNotNull('brand')->groupBy('brand')->get()->toArray();
        $categories = ProductCategory::get();
        $search = $request->searchproduct;
        $price = $request->price;
        $filter_brand = $request->brand;
        return view('common.search-results', compact('products','categories','search','price', 'brands', 'filter_brand'));
    }

    public function getProducts(Request $request)
    {
        $request->request->add(['limit' => 8]);
        $products = Product::getProducts($request);
        $brands = Product::select('brand')->whereNotNull('brand')->groupBy('brand')->get()->toArray();
        // echo "<pre>";
        // print_r($brands);die();
        $categories = ProductCategory::get();
        $search = $request->search;
        $price = $request->price;
        $filter_brand = $request->brand;
        return view('common.allproducts', compact('products','categories','search','price', 'brands', 'filter_brand'));
    }

    public function getCollectionProducts(Request $request, $id)
    {
        $request->request->add(['limit' => 8]);
        //$products = Product::getProducts($request);
        $products = Product::with('category:id,name',
    						 'images:id,product_id,file,file_type',
    						 'user:id,first_name')->where('category_id', $id)
                            ->where('status', ACTIVE_STATUS)->orderBy('id', 'DESC')->get();          
        $brands = Product::select('brand')->where('category_id', $id)->whereNotNull('brand')->groupBy('brand')->get()->toArray();
        // echo "<pre>";
        // print_r($products);die();
        $categories = ProductCategory::get();
        $search = $request->search;
        $price = $request->price;
        $filter_brand = $request->brand;
        return view('common.collectionproducts', compact('products','categories','search','price', 'brands', 'filter_brand'));
    }

    public function paginationRecords(Request $request)
    {
        $request->request->add(['limit' => 8]);
        $products = Product::getProducts($request);
        if($products->lastPage() == $request->page){
            $response['is_last_page'] = 1;
        }else{
            $response['is_last_page'] = 0;
        }
        $response['status'] = (count($products) > 0) ? 1 : 0;
        $response['html'] = View('ajax_view.products', compact('products'))->render();
        return response()->json($response);
        
    }

    public function productDetails($slug = null)
    {
        if($slug) {
            $product_details = Product::with('product_image')->where('sku', $slug)->first();
            $store_user_details = User::with('storeDetail')->find($product_details->user_id);
            $recent_products = Product::with('product_image')->where('sku', '!=', $slug)->latest()->take(4)->get()->toArray();

            $totalSoldProduct = OrderDetail::where('product_id', $product_details->id)->count();

            $checkProductView = ProductView::where('product_id', $product_details->id)->first();
     
            if(empty($checkProductView))
            {
                $productView = new ProductView;
                $productView->view_count = 1;
                $productView->product_id = $product_details->id;
                $productView->save();
            }
            else
            {
                $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

                if(!$pageWasRefreshed ) {
                    $productView = ProductView::find($checkProductView->id);
                    $productView->view_count = $checkProductView->view_count + 1;
                    $productView->product_id = $product_details->id;
                    $productView->save();
                }
            }

            $totalProductView = ProductView::where('product_id', $product_details->id)->first();
            // print_r($totalProductView);die();
            
            return view('common.productDetail', compact('product_details', 'recent_products', 'store_user_details', 'totalSoldProduct', 'totalProductView'));
        } else {
            return redirect('/');
        }
    }
}
