<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
    public function create() 
    {
        return view('app.dashboard.common');
    }
    public function list() 
    {
        return view('app.dashboard.common');
    }
    public function search(Request $request) 
    { 
        return view('app.dish.list');  
    }
    public function show(Request $request, $id) 
    { 
        return view('app.dish.single');  
    }
}
