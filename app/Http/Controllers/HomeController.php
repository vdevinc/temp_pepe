<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        return view('app.home.index');
    }
    public function about() 
    {
        return view('app.home.about');
    }
   
    public function privacypolicy() 
    {
        return view('app.home.privacy-policy');
    }
    public function terms() 
    {
        return view('app.home.terms');
    }
    
    public function faq() 
    {
        return view('app.home.faq');
    }
     public function faqclient() 
    {
        return view('app.home.faqclient');
    }
     public function faqchef() 
    {
        return view('app.home.faqchef');
    }
     public function privacyapp() 
    {
        return view('app.home.app.privacy');
    }
    public function termsapp() 
    {
        return view('app.home.app.terms');
    }
     public function faqapp() 
    {
        return view('app.home.app.faq');
    }
     public function faqchefapp() 
    {
        return view('app.home.app.faqchef');
    }
    public function faqclientapp() 
    {
        return view('app.home.app.faqclient');
    }
}
