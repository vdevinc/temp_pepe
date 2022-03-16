<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Chef;
use App\Role;
use App\Dish;
use App\Address;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChefApproved;
use App\Mail\ChefRejected;


class ChefsController extends Controller
{
    public function index() 
    {
    	$chefs=User::with('chef','role','address')->where('role_id','2')
                    ->orderBy('id', 'desc')->get();

        return view('admin.chefs.index',compact('chefs'));

    }
    public function chefDetails($userid) 
    {
    	$chefs=User::with('chef','role','address')
    			->where('role_id','2')->where('id',$userid)->first();
		return view('admin.chefs.chef_detail',compact('chefs'));

    }
    public function chefsApprove(Request $request){

        $user_id                 =   $request->user_id;
        $mail_id                 =   $request->email;
        $value                   =   '1';
        $agreement               =   $request->agreement;

        $chef                    =  User::with('chef','address')
                                    ->where('role_id','2')->where('id',$user_id)->first();
        $chefUpdate              = \DB::table('chefs')
                                    ->where('user_id', $user_id)
                                    ->update(['is_approved' => $value]); 
        
        Mail::to($mail_id)->cc('ask@pepelechef.com') ->send(new ChefApproved($chef));
        
        
       return redirect('/admin/chefs')->with('success','Chef approved successfully !  Notification sent to chef  along with contract');
    }
    public function chefsReject(Request $request){

        $user_id            =   $request->user_id;
        $mail_id            =   $request->email;
        $value              =   '0';

        $chef               =   User::with('chef','address')
                                ->where('role_id','2')->where('id',$user_id)->first();
              
        $chefUpdate         = \DB::table('chefs')
                                ->where('user_id', $user_id)
                                ->update(['is_approved'=> $value,'is_rejected'=> '1']);

        Mail::to($mail_id)->cc('support@pepelechef.com')->send(new ChefRejected($chef));
        return redirect('/admin/chefs')->with('success','Chef approval status is rejected.Please check your mail');
       
    }
    /**
     * Delete Chefs
     */
    public function delete($id) 
    {

        $user = User::where('id', $id)->first();
        $address = Address::where('user_id', $id)->first();
        $chefs = Chef::where('user_id', $id)->first();
        $dishes = Dish::where('user_id', $id);
        if(!$user) {
            return $this->respondWithError('user does not exist');
        }
     
        //delete user row
        $chefs->delete();
        $address->delete();
        $user->delete();
        $dishes->delete();     
       return redirect()->back()
            ->with('flash_message_success','Chefs deleted successfully');

    }
}
