<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function search()
    {
        return view('app.chef.list');
    }

    public function show(Request $request, $id) 
    { 
        return view('app.chef.single');  
    }
}
