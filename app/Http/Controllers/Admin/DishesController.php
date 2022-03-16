<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\DishServiceType;
use App\Address;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\DishApproved;
use App\Mail\NewdishapprovenotificationAdmin;
use App\Mail\DishRejected;


class DishesController extends Controller
{
    public function index() 
    {
    	$dishes=Dish::with('service_type','user')->orderBy('id', 'desc')->get();

        return view('admin.dishes.index',compact('dishes'));

    }
    public function dishDetails($dishId) 
    {
    	
        $dishes=Dish::with('service_type','user')->where('id',$dishId)->first();

		return view('admin.dishes.dish_detail',compact('dishes'));

    }
    public function dishApprove(Request $request){

        $dish_id            =   $request->dish_id;
        $mail_id            =   $request->email;
        $value              =   '1';
        $dish               =   Dish::with('service_type','user')->where('id',$dish_id)->first();
        $dishUpdate         = \DB::table('dishes')
                                ->where('id', $dish_id)
                                ->update(['is_approved' => $value]); 
            
        Mail::to($mail_id)->send(new DishApproved($dish));
        Mail::to('ask@pepelechef.com')->send(new NewdishapprovenotificationAdmin($dish));

        return redirect('/admin/dishes')->with('success','Dish approved successfully !  Notification mail sent successfully');
    }
    public function dishReject(Request $request){

        $dish_id            =   $request->dish_id;
        $mail_id            =   $request->email;
        $value              =   '0';
        $dish               =   Dish::with('service_type','user')->where('id',$dish_id)->first();
        
        
        $dishUpdate         = \DB::table('dishes')
                                ->where('id', $dish_id)
                                ->update(['is_approved'=> $value,'is_rejected'=> '1']); 

        Mail::to($mail_id)->send(new DishRejected($dish));
        return redirect('/admin/dishes')->with('success','Dish  approval status is rejected.Please check your mail');
    }
     public function delete($id) 
    {

        $dish = Dish::where('id', $id)->first();
   
        if(!$dish) {
            return $this->respondWithError('user does not exist');
        }
     
        //delete user row
        $dish->delete();
      
               
       return redirect()->back()
            ->with('flash_message_success','Dish deleted successfully');

    }

}
