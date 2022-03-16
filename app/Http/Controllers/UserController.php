<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login() 
    {
        return view('app.auth.login');
    }
    public function chef() 
    {
        return view('app.auth.register-chef');
    }
    public function client() 
    {
        return view('app.auth.register-client');
    }
    public function passwordReset() 
    {
        return view('app.auth.login');
    }
    public function passwordResetConfirm() 
    {
        return view('app.auth.login');
    }
}
