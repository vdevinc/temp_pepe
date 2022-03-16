<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Dish;
use App\DishServiceType;
use App\Address;
use Session;
use Illuminate\Support\Facades\Mail;
// use App\Mail\OrderApproved;
// use App\Mail\DishRejected;

class OrdersController extends Controller
{
    
	public function index() 
    {
    	$orders=Order::with('service_type','user','dish','rating')->orderBy('id', 'desc')->get();

        return view('admin.orders.index',compact('orders'));

    }
    public function orderDetails($orderId) 
    {
        $orders=Order::with('service_type','user','dish','rating')->where('id',$orderId)->first();
       // print_r($orders);exit;
		return view('admin.orders.order_detail',compact('orders'));

    }
     public function reviewDetails($orderId) 
    {
        
        $orders=Order::with('rating')->where('id',$orderId)->first();

        return view('admin.orders.review_detail',compact('orders'));

    }
    public function review_status(Request $request){
        

        $order_id                   =   $request->order_id;
        $mail_id                    =   $request->email;
        $review_status              =   $request->review_status;
        if($review_status=='approve'){

            $is_approved     =   '1';
            $is_rejected     =   '0';
            $msg             =    "order review approved successfully !";
        }else{
            $is_approved     =   '0';
            $is_rejected     =   '1';
            $msg             =   "order review rejected successfully !";
        }
        

        $orders             =   Order::with('user')->where('id',$order_id)->first();
        $updateDetails = ['is_approved' => $is_approved,'is_rejected' => $is_rejected];
                            

        $dishUpdate         = \DB::table('order_ratings')
                                ->where('order_id', $order_id)
                                ->update($updateDetails);
                               
            
        
        return redirect('/admin/orders')->with('success',$msg);
    }
}
