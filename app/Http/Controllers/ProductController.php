<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;

class ProductController extends Controller
{
    public function getStarted(Request $request)
    {
        $request->request->add(['limit' => 8]);
        $request->request->add(['orderBy' => 'DESC']);
        $products = Product::getProducts($request);
        return view('getstarted', compact('products'));
    }

    public function searchresults(Request $request)
    {
        $request->request->add(['limit' => 8]);
        $products = Product::getProducts($request);
        $categories = ProductCategory::get();
        $search = $request->search;
        return view('common.search-results', compact('products','categories','search'));
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

    public function paginationRecords(Request $request)
    {
        $request->request->add(['limit' => 8]);
        $products = Product::getProducts($request);
        $response['status'] = (count($products) > 0) ? 1 : 0;
        $response['html'] = View('ajax_view.products', compact('products'))->render();
        return response()->json($response);
        
    }

    public function productDetails($slug = null)
    {
        if($slug) {
            $product_details = Product::with('product_image')->where('sku', $slug)->first();
            $recent_products = Product::with('product_image')->where('sku', '!=', $slug)->latest()->take(4)->get()->toArray();
            
            return view('common.productDetail', compact('product_details', 'recent_products'));
        } else {
            return redirect('/');
        }
    }
}
