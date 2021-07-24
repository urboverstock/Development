<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocument;
use Auth, Validator;

class SellerController extends Controller
{
    public $uploadUserProfilePath = 'assets/images/users';

    public function dashboard(Request $request)
    {

      if(!Auth::check()){
        return redirect()->route('signin')->with('error', 'You need to login first');
      }

      return view('seller.dashboard');
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
                return redirect()->route('seller_edit_profile_documents');
            }else{
                return redirect()->back()->with('error', COMMON_ERROR);
            }
        }

        return view('seller.edit_profile', compact('user'));
    }

    public function edit_profile_documents(Request $request){

        $user = User::where('id', Auth::user()->id)
                ->first();

        $doc_1 = UserDocument::where('user_id', $user->id)
                    ->where('type', '1')
                    ->first();
        $doc_2 = UserDocument::where('user_id', $user->id)
                    ->where('type', '2')
                    ->first();

        $doc_3 = UserDocument::where('user_id', $user->id)
                    ->where('type', '3')
                    ->first();

        if($request->isMethod('post')){
            $postData = $request->all();
            // echo "<pre>"; print_r($postData); die;

            if(isset($postData['doc_1']) && !empty($postData['doc_1'])){
                if(empty($doc_1)){
                    $doc_1          = new UserDocument;
                    $doc_1->user_id = $user->id;
                    $doc_1->type    = '1';
                }

                $doc_1->document = UploadImage($postData['doc_1'], $this->uploadUserProfilePath);
                $doc_1->doc_original_name = $postData['doc_1']->getClientOriginalName();
                $doc_1->save();
            }

            if(isset($postData['doc_2']) && !empty($postData['doc_2'])){
                if(empty($doc_2)){
                    $doc_2          = new UserDocument;
                    $doc_2->user_id = $user->id;
                    $doc_2->type    = '2';
                }

                $doc_2->document = UploadImage($postData['doc_2'], $this->uploadUserProfilePath);
                $doc_2->doc_original_name = $postData['doc_2']->getClientOriginalName();
                $doc_2->save();
            }

            if(isset($postData['doc_3']) && !empty($postData['doc_3'])){
                if(empty($doc_3)){
                    $doc_3          = new UserDocument;
                    $doc_3->user_id = $user->id;
                    $doc_3->type    = '3';
                }

                $doc_3->document = UploadImage($postData['doc_3'], $this->uploadUserProfilePath);
                $doc_3->doc_original_name = $postData['doc_3']->getClientOriginalName();
                $doc_3->save();
            }

            return redirect()->route('seller_dashboard')->with('success', 'Profile updated successfully');
        }

        return view('seller.edit_profile_documents', compact('user', 'doc_1', 'doc_2', 'doc_3'));
    }
}
