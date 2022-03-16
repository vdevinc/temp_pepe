<?php

namespace App\Http\Controllers\Api;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


use App\Http\Controllers\Controller;

class FileController extends ApiController
{

    public function profile(Request $request) 
    { 
        $validator = Validator::make($request->all(), [
            'file' => 'required',
            'file_type' => 'required'
        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        $fileType = $request->get('file_type');

        if(!$request->hasFile('file')) {
            return $this->respondWithError('File not present.');
        }

        $dir = public_path('uploads');

        if(!File::exists($dir)) {
              File::makeDirectory($dir, $mode = 0755, true, true);
        }

        $userDir = 'uploads/user/'.Auth::user()->id;
        $fileName = $fileType . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path($userDir), $fileName);

        if($fileType ==  'file_avatar') {
            Auth::user()->file_avatar = $fileName;
            Auth::user()->save();
        } else if($fileType == 'file_govt_id') { 

            $chef =  Auth::user()->chef()->first();
            $chef->file_govt_id = $fileName;
            $chef->save();

        }else if($fileType == 'file_culinary_cert') {
            $chef =  Auth::user()->chef()->first();
            $chef->file_culinary_cert = $fileName;
            $chef->save();
        }

        $file = [
            'url' => url($userDir.'/'.$fileName)
        ];

        return $this->respondWithSuccess('successfully uploaded.', compact('file'));

    }

  
   

   
}
