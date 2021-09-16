<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\ProductCategory;
use App\Models\ProductCompanies;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\UserFollowers;
use Auth, Validator, DB;

class BuyerController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function index(Request $request)
    {
        $request->request->add(['limit' => 6]);
        $latestProducts = Product::getLatestProducts($request);
        $request->request->add(['limit' => 3]);
        $sellers = User::getSellers($request);
        // echo "<pre>"; print_r($latestProducts); die;
        return view('common.home', compact('latestProducts', 'sellers'));
    }

    public function dashboard(Request $request)
    {

      if(!Auth::check()){
        return redirect()->route('signin')->with('error', 'You need to login first');
      }
      $user = User::find(Auth::user()->id);
      $followers = UserFollowers::where(['follower_id'=>Auth::user()->id])->count();
      $followings = UserFollowers::where(['user_id'=>Auth::user()->id])->count();
      return view('buyer.dashboard', compact('user','followers','followings'));
    }

    public function edit_profile(Request $request){

        $user = User::find(Auth::user()->id);

        if($request->isMethod('post')){
            $postData = $request->all();
            $validator = Validator::make($postData, [
                'first_name' => 'required',
                'last_name' => 'required',
                'isd_code' => 'required|digits_between:2,3',
                'phone_number' => 'required|digits:10,10',
                // 'email' => 'required|email|unique:users',
                'location' => 'required',
                'billing_address' => 'required',
                'about' => 'required',
                // 'gender' => 'required'
            ],[
                'about.required' => 'The bio field is required'
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }

            $user->first_name       = $postData['first_name'];
            $user->last_name        = $postData['last_name'];
            $user->isd_code         = $postData['isd_code'];
            $user->phone_number     = $postData['phone_number'];
            $user->location         = $postData['location'];
            $user->billing_address  = $postData['billing_address'];
            $user->about            = $postData['about'];

            if(isset($postData['profile_pic']) && !empty($postData['profile_pic'])){
                $user->profile_pic = UploadImage($postData['profile_pic'], $this->uploadUserProfilePath);
            }

            if($user->save()){
                return redirect()->route('buyer.view_profile');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        return view('buyer.edit_profile', compact('user'));
    }

    public function view_profile(){

        $user = User::where('id', Auth::id())
                ->with('products.product_image')
                ->first();

        if(!empty($user)){
            $user = $user->toArray();
        }
        // echo "<pre>"; print_r($user); die;

        return view('buyer.view_profile', compact('user'));
    }

    public function get_followers(){
        if(!Auth::check()){
            return redirect()->route('signin')->with('error', 'You need to login first');
        }
        $user = User::find(Auth::user()->id);
        $followers = UserFollowers::where(['follower_id'=>Auth::user()->id])->count();
        $followings = UserFollowers::where(['user_id'=>Auth::user()->id])->count();

        $get_followers = DB::table('user_followers')
                    ->distinct()
                    ->select("users.id","users.first_name","users.profile_pic","user_followers.user_id","user_followers.follower_id")
                    ->leftJoin('users', function ($join) {
                        $join->on('user_followers.user_id', '=', 'users.id');
                    })
                    ->where('user_followers.follower_id', '=', Auth::user()->id)
                    ->get();

        $get_followings = DB::table('user_followers')
                    ->distinct()
                    ->select("users.id","users.first_name","users.profile_pic","user_followers.user_id","user_followers.follower_id")
                    ->leftJoin('users', function ($join) {
                        $join->on('user_followers.follower_id', '=', 'users.id');
                    })
                    ->where('user_followers.user_id', '=', Auth::user()->id)
                    ->get();

        //echo "<pre>";print_r($get_followings);die;
        return view('buyer.show_followers', compact('user','followers','followings','get_followers','get_followings'));
    }
}
