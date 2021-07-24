<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth, Validator, Hash;

class LandingController extends Controller
{


    public function home(Request $request)
    {
        $request->request->add(['limit' => 6]);
        $latestProducts = Product::getLatestProducts($request);
        $request->request->add(['limit' => 3]);
        $sellers = User::getSellers($request);
        // echo "<pre>"; print_r($latestProducts); die;
        return view('common.home', compact('latestProducts', 'sellers'));
    }

    public function register(Request $request)
   {

      if($request->isMethod('post')){
         $postData = $request->all();
         // echo "<pre>"; print_r($postData); die;

         $validator = Validator::make($postData, [
            'first_name' => 'required',
            'last_name' => 'required',
            'isd_code' => 'required|digits_between:2,3',
            'phone_number' => 'required|digits:10,10',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'location' => 'required',
            'gender' => 'required'
         ]);

         if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }

         $user                = new User;
         $user->first_name    = $postData['first_name'];
         $user->last_name     = $postData['last_name'];
         $user->isd_code      = $postData['isd_code'];
         $user->phone_number  = $postData['phone_number'];
         $user->email         = $postData['email'];
         $user->password      = Hash::make($postData['password']);
         $user->location      = $postData['location'];
         $user->gender        = $postData['gender'];
         $user->save();

         Auth::login($user);

         return redirect()->route('seller_dashboard')->with('success', 'Account created successfully.');
      }

      return view('register');
   }

    public function signIn(Request $request)
   {
      if($request->isMethod('post')){
         $postData = $request->all();
         // echo "<pre>"; print_r($postData); die;

         $validator = Validator::make($postData, [
            'email' => 'required|email',
            'password' => 'required'
         ]);

         if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }

         $user = User::where('email', $postData['email'])
                  ->first();

         if(empty($user)){
            return redirect()->back()->with('error', 'No account registered with this email');
         }

         if (Auth::attempt([
               'email' => $postData['email'],
               'password' => $postData['password']
         ])) {

            return redirect()->route('seller_dashboard')->with('success', "Logged in successfully");
         } else {
            return redirect()->back()->with('error', 'Invalid email and password combination');
         }
      }

      return view('login');
   }


    public function forgot_password(Request $request)
    {
      if($request->isMethod('post')){
         $postData = $request->all();
         // echo "<pre>"; print_r($postData); die;

         $validator = Validator::make($postData, [
            'email' => 'required|email'
         ]);

         if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }

         $user = User::where('email', $postData['email'])
                  ->first();

         if (!empty($user)) {
            $postData['subject'] = "Reset Password";
            $postData['layout'] = 'email_templates.reset_password';
            $postData['new_password'] = rand();
            $user->password = Hash::make($postData['new_password']);
            $user->save();
            $mail = emailSend($postData);
            return redirect()->back()->with('success', 'Password reset email sent successfully');
         } else {
            return redirect()->back()
                  ->with('error', 'No account registered with this email')
                  ->withInput();
         }
      }

      return view('forgot_password');
    }

   public function logout()
   {
      Auth::logout();
      return redirect()->route('signin')->with('success', 'Logout successfully');
   }

   public function getStarted(Request $request)
   {
      return view('getstarted');
   }
}