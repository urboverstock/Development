<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function sendNewsLetter(Request $request)
    {
    	$userEmail = $request->email;

        $checkEmail = Newsletter::where('email', $userEmail)->first();

        if(!empty($checkEmail))
        {
            return redirect()->to('/')->with('success', 'Already subscribed');   
        }


    	$strFromEmail = config('mail.from.address');
    	$strFromName = config('mail.from.name');
    	$viewContent = view('email_templates.newsletter', ['userEmail' => $userEmail]);
    	$subject = 'Success';

    	sendEmailNotification($userEmail, $strFromEmail, $strFromName, $viewContent, $subject);

    	$newsletter = new Newsletter;
    	$newsletter->email = $userEmail;
    	$newsletter->status = SUBSCRIBED;

    	if($newsletter->save())
    	{
    		return redirect()->to('/')->with('success', 'Successfully subscribed');
    	}

    	
    }
}
