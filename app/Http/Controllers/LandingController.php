<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class LandingController extends Controller
{


    public function home(Request $request)
    {
        $request->request->add(['limit' => 6]);
        $latestProducts = Product::getLatestProducts($request);
        $request->request->add(['limit' => 3]);
        $sellers = User::getSellers($request);
        //echo "<pre>"; print_r($latestProducts); die;
        return view('common.home', compact('latestProducts', 'sellers'));
    }

    public function register(Request $request)
    {
       return view('register');
    }

    public function signIn(Request $request)
    {
       return view('login');
    }

    public function getStarted(Request $request)
    {
       return view('getstarted');
    }

    public function searchresults(Request $request)
    {
        $request->request->add(['limit' => 20]);
        $products = Product::getProducts($request);
        
        return view('common.search-results', compact('products'));
    }

}