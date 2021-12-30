<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\ProductCategory;
use App\Models\ProductCompanies;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\ProductImage;
use App\Models\ProductWishlist;
use App\Models\ProductFavourite;
use App\Models\ProductRating;
use Auth, Validator;
use App\Models\Notification;
use App\Models\UserOffer;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    //Get all list of product favourite and also Search via user name and product name
    public function productFavourite(Request $request)
    {
        // print_r($request->all());die();
        $productId = Product::where('user_id', Auth::user()->id)->get()->pluck('id')->toArray();

        $search = $request->search;

        if(!empty($search) && isset($search))
        {
            // print_r($search);die();
            $favourites = ProductFavourite::with('getUserDetail', 'getProductDetail:id,name')
            ->whereHas('getUserDetail', function($q) use($search)
            {
                $q->select('id', 'first_name', 'profile_pic', 'last_name')
                ->where('first_name', 'LIKE', '%'. $search .'%')
                ->orWhere('last_name', 'LIKE', '%'. $search .'%');
                // print($q->toSql());die();
            })
            ->orWhereHas('getProductDetail', function($q) use($search)
            {
                $q->select('id', 'name','price','sku')->where('name', 'LIKE', '%'. $search .'%');
            })
            ->where('user_id', Auth::user()->id);
        }
        else
        {
            $favourites = ProductFavourite::with(['getUserDetail' => function($q)
            {
                $q->select('id', 'first_name', 'profile_pic', 'last_name');
            }])
            ->with(['getProductDetail' => function($q)
            {
                $q->select('id', 'name','price','sku');
            }])
            ->where('user_id', Auth::user()->id);
        }

        
        $favourites = $favourites->get()->toArray();

        // echo "<pre>";
        // print_r($favourites);die();

        return view('buyer.product.productFavourite', compact('favourites'));
    }

    public function delete_favourite($id)
    {
        $id = Crypt::decrypt($id);
        $favourite = ProductFavourite::find($id);
        if($favourite->delete())
        {
            return redirect()->route('buyerFavouriteProduct')->with('success', 'Favourite removed successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function reviewsubmit(Request $request)
    {
        if(!Auth::check()){
            return response()->json(['status' => 2, 'message' => 'Please login first.']);
            //return redirect()->route('signin')->with('error', 'You need to login first');
        }
        
        $userId = Auth::user()->id;

        $checkOrderComplete = OrderDetail::where(['product_id' => $request->product_id, 'user_id' => $userId, 'status' => 2])->count();

        if($checkOrderComplete == 0)
        {
            return response()->json(['status' => 0, 'message' => 'Buy This Product First.']);
        }
        else
        {
            $prev = ProductRating::where('product_id', $request->product_id)->where('user_id', $userId)->first();

            if(!empty($prev))
            {
                return response()->json(['status' => 0, 'message' => 'You Have Reviewed Already.']);
            }
            
            $Rating = new ProductRating;
            $Rating->user_id = Auth::user()->id;
            $Rating->product_id = $request->product_id;
            $Rating->rating = $request->rating;
            $Rating->review = $request->comment;
            $Rating['created_at'] = date('Y-m-d H:i:s');
            $Rating->save();
            return response()->json(['status' => 1, 'message' => 'Your Rating Submitted Successfully.']);
        }
            
    }

}
