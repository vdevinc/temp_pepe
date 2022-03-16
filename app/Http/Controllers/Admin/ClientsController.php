<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Address;
use Session;

class ClientsController extends Controller
{
    public function index() 
    {
        
        $clients=User::with('role','address')->where('role_id','1')
                    ->orderBy('id', 'desc')->get();
       
		return view('admin.clients.index',compact('clients'));
    }
    public function clientsDetails($userid) 
    {
    	$clients=User::with('role','address')
    			->where('role_id','1')->where('id',$userid)->first();
		return view('admin.clients.clients_detail',compact('clients'));

    }
    /**
     * Delete Clients
     */
    public function delete($id) 
    {

        $user = User::where('id', $id)->first();
        $address = Address::where('user_id', $id)->first();

        if(!$user) {
            return $this->respondWithError('user does not exist');
        }
     
        //delete user row
        $address->delete();
        $user->delete();
               
       return redirect()->back()
            ->with('flash_message_success','Client deleted successfully');

    }
}
