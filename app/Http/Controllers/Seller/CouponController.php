<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponStoreRequest;
use App\Http\Requests\CouponUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Auth, Validator;
use Illuminate\Support\Facades\Crypt;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if(!empty($search))
        {
            $data['coupons'] = Coupon::where('name', 'like', '%' . $search . '%')->get()->toArray();
        }
        else
        {
            $data['coupons'] = Coupon::get()->toArray();
        }
        return view('seller.coupon.couponList', $data);
    }

    public function create(Request $request)
    {
        return view('seller.coupon.addCoupon');
    }

    public function store(CouponStoreRequest $request)
    {
        $coupon = new Coupon;
        $coupon->user_id = Auth::id();
        $coupon->name = $request->name;
        $coupon->type = $request->type;
        $coupon->price = $request->price;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        
        
        if($coupon->save()){
            return redirect()->route('sellerCoupon')->with('success', 'Coupon added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function editCoupon($id)
    {
    	$coupon = Coupon::find($id);
        return view('seller.coupon.addCoupon', compact('coupon'));
    }

    public function update(CouponUpdateRequest $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->user_id = Auth::id();
        $coupon->name = $request->name;
        $coupon->type = $request->type;
        $coupon->price = $request->price;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        
        if($coupon->save()){
            return redirect()->route('sellerCoupon')->with('success', 'Coupon added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function show($id)
    {
    	$coupon = Coupon::find($id);
    }

    public function delete($id)
    {
        $coupon = Coupon::find($id);
        if($coupon->delete())
        {
            return redirect()->route('sellerCoupon')->with('success', 'Coupon deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }
}
