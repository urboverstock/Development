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
        $request->request->add(['limit' => 20]);
        $request->request->add(['orderBy' => 'DESC']);
        $products = Product::getProducts($request);
        return view('getstarted', compact('products'));
    }

    public function searchresults(Request $request)
    {
        $request->request->add(['limit' => 20]);
        $products = Product::getProducts($request);
        $categories = ProductCategory::get();
        $search = $request->search;
        return view('common.search-results', compact('products','categories','search'));
    }

    public function paginationRecords(Request $request)
    {
        $request->request->add(['limit' => 20]);
        $products = Product::getProducts($request);
        $response['status'] = (count($products) > 0) ? 1 : 0;
        $response['html'] = View('ajax_view.products', compact('products'))->render();
        return response()->json($response);
        
    }
}
