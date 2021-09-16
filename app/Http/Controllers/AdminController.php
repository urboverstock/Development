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

class AdminController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function dashboard(Request $request)
    {
      if(!Auth::check()){
        return redirect()->route('signin')->with('error', 'You need to login first');
      }
      return view('admin.dashboard');
    }

    public function add_product(Request $request)
    {
      return view('admin.products.add');
    }
}
