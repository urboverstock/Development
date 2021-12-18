<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserPost;
use App\Models\UserRate;
use App\Models\UserFollowers;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function profile($user_id)
    {
    	$user_id = Crypt::decrypt($user_id);
    	$user = User::find($user_id);
        $login_id = Auth::user()->id;
    	
    	$user_posts = UserPost::with('getUserPostFile', 'getUser', 'getPostLike')->where('user_id', $user_id)->latest()->get();

    	$countRateAvg = UserRate::where('rated_user_id', $user_id)->avg('rate');

    	$getUserRate = UserRate::where(['rated_user_id' => $user_id])->first();
        $UserFollowers = UserFollowers::where(['user_id' => $login_id ,'follower_id' => $user_id])->first();
    	 //echo "<pre>";
    	// print_r($UserFollowers);die();
    	return view('profile.user_profile', compact('user', 'user_posts', 'countRateAvg', 'getUserRate' ,'UserFollowers'));
    }

    public function userRate(Request $request)
    {
    	$rate_value = $request->rate_value;
    	$rate_user_id = $request->rate_user_id;
    	$user_id = Auth::user()->id;

    	$check = UserRate::where(['rated_user_id' => $rate_user_id, 'user_id' => $user_id])->first();

    	if(!empty($check))
    	{
    		$response["status"] = 0;
	        $response["message"] = "Already Rated";
    	}
    	else
    	{
    		$userRate = new UserRate;
	    	$userRate->rated_user_id = $rate_user_id;
	    	$userRate->user_id = $user_id;
	    	$userRate->rate = $rate_value;

	    	if($userRate->save())
	    	{
	            $response["status"] = 1;
	            $response["message"] = "Rating successfully";
	        }else{
	            $response["status"] = 0;
	            $response["message"] = "Something went wrong";
	        }	
    	}
    	

        return response()->json($response);
    }

    
}
