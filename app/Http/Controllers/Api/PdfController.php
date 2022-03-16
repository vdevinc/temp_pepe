<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheficaSignup;
use App\Mail\IcasignednotificationAdmin;


use PDF;

class PdfController extends ApiController
{
    public function agreement(Request $request) 
    {
        if(!$request->hasFile('file_sig')) {
            return $this->respondWithError('Signature file not present.');
        }

        $user = User::with('chef')->where('id', Auth::user()->id)->first();
        
        $userDir = 'uploads/user/'.Auth::user()->id;
        $fileName =  'signature.' . $request->file_sig->getClientOriginalExtension();
        $request->file_sig->move(public_path($userDir), $fileName);

        //return view('app.pdf.template-agreement', ['name' =>  'nana', 'sig_file'=> $userDir.'/'.$fileName]);
        $sigFile =  $userDir.'/'.$fileName;

        $pdf = PDF::loadView('app.pdf.template-agreement', ['user' =>  $user, 'sig_file'=> $sigFile]);
        $pdf->save(public_path('uploads/user/'.$user->id.'/agreement.pdf'));

        $chef = $user->chef()->first();
        $chef->is_agrmt_signed = 1;
        $chef->save();
        
        $aggrement = [
           'url' => url($userDir.'/agreement.pdf')
        ];

                $chefaddress =Address::where('user_id', $user->id)->first();

                Mail::to(Auth::user()->email)->send(new CheficaSignup($chef));
                Mail::to('ask@pepelechef.com')->send(new IcasignednotificationAdmin($user, $chefaddress));


        return $this->respondWithSuccess('Agreement signed successfully.', compact('aggrement'));


    }
}
