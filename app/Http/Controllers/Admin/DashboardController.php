<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Chef;
use App\Role;
use App\Address;
use Session;
use App\Dish;
use App\DishServiceType;
use App\Order;

class DashboardController extends Controller
{
    public function index() 
    {
    	
    	$chefspendCount			= 	Chef::where('is_approved','0')->count();
		$dishespendCount		= 	Dish::where('is_approved','0')->count();
		$ordersCount			=	Order::where('is_approved','0')->count();		
    	return view('admin.dashboard.index',compact('chefspendCount','dishespendCount',
    		'ordersCount'));

    }
}
