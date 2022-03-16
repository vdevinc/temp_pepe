<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function chef() 
    {
        return view('app.dashboard.common');

    }
}
