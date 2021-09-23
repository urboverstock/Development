<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Address;
use Auth, Validator;
use Illuminate\Support\Facades\Crypt;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        if(!empty($search))
        {
            $data['address'] = Address::where('city', 'like', '%' . $search . '%')
            ->where('user_id', Auth::user()->id)->get()->toArray();
        }
        else
        {
            $data['address'] = Address::where('user_id', Auth::user()->id)->get()->toArray();
        }
        return view('buyer.address.addressList', $data);
    }

    public function create(Request $request)
    {
        return view('buyer.address.addAddress');
    }

    public function store(AddressStoreRequest $request)
    {
        $address = new Address;
        $address->user_id = Auth::id();
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->pincode = $request->pincode;
        $address->default = $request->default;
        
        if($address->save()){
            return redirect()->route('buyerAddress')->with('success', 'Address added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function editAddress($id)
    {
        $id = Crypt::decrypt($id);
    	$address = Address::find($id);
        return view('buyer.address.addAddress', compact('address'));
    }

    public function update(AddressUpdateRequest $request)
    {
        $adress = Address::find($request->id);
        $adress->user_id = Auth::id();
        $adress->city = $request->city;
        $adress->state = $request->state;
        $adress->country = $request->country;
        $adress->pincode = $request->pincode;
        $adress->default = $request->default;
        
        if($adress->save()){
            return redirect()->route('buyerAddress')->with('success', 'Address update successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    public function show($id)
    {
    	$address = Address::find($id);
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        $address = Address::find($id);
        if($address->delete())
        {
            return redirect()->route('buyerAddress')->with('success', 'Address deleted successfully');
        }
        else
        {
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }
}
