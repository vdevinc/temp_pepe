<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    function payment() 
    {
        return view('app.client.payment');
    }
}
