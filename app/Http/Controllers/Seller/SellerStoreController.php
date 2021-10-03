<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerStore;
use App\Http\Requests\SellerStoreRequest;
use Auth, Validator;
use Redirect;

class SellerStoreController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = SellerStore::where('user_id',  Auth::user()->id)->first();

        return view('seller.store.add', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = SellerStore::where('user_id',  Auth::user()->id)->first();

        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'phone_number' => 'required|digits:10,10',
                'address' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            if(empty($store))
            {
                $sellerStore = new SellerStore;
            }
            else
            {
                $sellerStore = SellerStore::find($store->id);
            }

            $sellerStore->user_id = Auth::user()->id;
            $sellerStore->name = $request->name;
            $sellerStore->phone_number = $request->phone_number;
            $sellerStore->address = $request->address;
            $sellerStore->description = $request->description;

            if(isset($request->profile_pic) && !empty($request->profile_pic)){
                $sellerStore->picture = UploadImage($request->profile_pic, $this->uploadUserProfilePath);
            }

            // print_r($sellerStore);die();
            if($sellerStore->save())
            {
                return redirect()->back()->with('success', 'Store Updated Successfully');
            }
        }

        return view('seller.store.add', compact('store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SellerStore  $sellerStore
     * @return \Illuminate\Http\Response
     */
    public function show(SellerStore $sellerStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SellerStore  $sellerStore
     * @return \Illuminate\Http\Response
     */
    public function edit(SellerStore $sellerStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SellerStore  $sellerStore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SellerStore $sellerStore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SellerStore  $sellerStore
     * @return \Illuminate\Http\Response
     */
    public function destroy(SellerStore $sellerStore)
    {
        //
    }
}
