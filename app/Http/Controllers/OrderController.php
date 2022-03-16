<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function listForClient() 
    {
        return view('app.dashboard.common');
    }

    public function listForChef() 
    {
        return view('app.dashboard.common');
    }
    public function checkout() 
    {
        return view('app.dashboard.common');
    }
    public function complete() 
    {
        return view('app.dashboard.common');
    }


}
