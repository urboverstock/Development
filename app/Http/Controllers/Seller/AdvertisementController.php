<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementStoreRequest;
use App\Http\Requests\AdvertisementUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Crypt;
use Auth, Validator;

class AdvertisementController extends Controller
{
    public $uploadImagePath = '/assets/images/banners';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::where('seller_id', Auth::user()->id)->get()->toArray();
        return view('seller.advertisement.listing', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.advertisement.addAdvertisement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementStoreRequest $request)
    {
        $advertisement = new Advertisement;
        $advertisement->seller_id = Auth::id();
        $advertisement->description = $request->description;

        if($request->banner)
        {
            $file = $request->banner;
            $extension = $file->getClientOriginalExtension();
            $picture = date('YmdHis') . '.' . $extension;
            $destinationPath = base_path() . '/public'.$this->uploadImagePath;
        
            $file->move($destinationPath, $picture);

            $advertisement->banner = $this->uploadImagePath . '/' . $picture; 
        }
                
        if($advertisement->save()){
            return redirect()->route('sellerListAdvertisement')->with('success', 'Advertisement added successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $advertisement = Advertisement::find($id);
        return view('seller.advertisement.showAdvertisement', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $advertisement = Advertisement::find($id);
        return view('seller.advertisement.addAdvertisement', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementUpdateRequest $request)
    {
        $advertisement = Advertisement::find($request->id);

        $advertisement->seller_id = Auth::id();
        $advertisement->description = $request->description;

        if($request->banner)
        {
            $file = $request->banner;
            $extension = $file->getClientOriginalExtension();
            $picture = date('YmdHis') . '.' . $extension;
            $destinationPath = base_path() . '/public'.$this->uploadImagePath;
            $file->move($destinationPath, $picture);

            $advertisement->banner = $this->uploadImagePath . '/' . $picture; 
        }
                
        if($advertisement->save()){
            return redirect()->route('sellerListAdvertisement')->with('success', 'Advertisement updated successfully');
        }else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $advertisement = Advertisement::find($id);

        if($advertisement)
        {
            $advertisement->delete();

            return redirect()->route('sellerListAdvertisement')->with('success', 'Advertisement updated successfully');
        }
        else{
            return redirect()->back()->with('error', COMMON_ERROR);
        }
    }
}
