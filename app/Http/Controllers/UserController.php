<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function profile($user_id)
    {
    	$user_id = Crypt::decrypt($user_id);
    	$user = User::find($user_id);
    	
    	$user_posts = UserPost::with('getUserPostFile', 'getUser', 'getPostLike')->where('user_id', $user_id)->latest()->get();
    	return view('profile.user_profile', compact('user', 'user_posts'));
    }
}
