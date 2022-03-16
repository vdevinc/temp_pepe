<?php

namespace App\Http\Controllers\Admin;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login() 
    {
        return view('admin.login.index');

    }

    public function authenticate(Request $request) 
    {
        $user = User::where('email', $request->get('email'))->first();

        if($user && $user->role()->first()->slug != 'admin') {
            return redirect()->back();
        }

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
         }

         return redirect()->back();

    }
    public function logout() 
    {
    Auth::logout();
        return view('admin.login.index');
    }
}
