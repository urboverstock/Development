<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class LandingController extends Controller
{


    public function register(Request $request)
    {
       return view('register');
    }

    public function signIn(Request $request)
    {
       return view('login');
    }

}
