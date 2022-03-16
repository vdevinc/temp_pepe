<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Redirect;

class ContactUsController extends Controller
{
	public function contact() 
    {
        return view('app.home.contact');
    }

  public function sendmail(Request $request)
  {
	
	 
	 if($request->isMethod('post')){

	 	$data        			= 	$request->all();
		$mail_id				=	'ask@pepelechef.com';	
		
		Mail::to($mail_id) ->send(new ContactUs($data));
        
        return Redirect::back()->with('success','Mail sent Successfully!!');
      //return redirect('/contact')->with('success','Mail sent Successfully!!');
		
	 }
	 		

	}
}
