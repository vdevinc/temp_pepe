<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\UserDevice;
use App\Chef;
use App\Address;
use App\ZipCode;

use App\Transformers\UserTransformer;
use App\Mail\ChefCreated;
use App\Mail\ClientCreated;
use App\Mail\NewchefnotificationAdmin;
use App\Mail\PasswordReset;

use App\Jobs\SendFcm;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Intervention\Image\ImageManagerStatic as Image;



use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;




use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends ApiController
{

    use SendsPasswordResetEmails;
    use ResetsPasswords { 
        ResetsPasswords::broker as private resetBroker; 
        ResetsPasswords::credentials insteadof SendsPasswordResetEmails;
        SendsPasswordResetEmails::broker insteadof ResetsPasswords;
    }

    public function __construct(UserTransformer $userTransformer) 
    {
        $this->userTransformer = $userTransformer;
    }

    public function validateChef(Request $request) 
    {
        return  $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'zip' => 'required',
                'address_line_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'chef_type' => 'required',
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

    }
    public function validateProfile(Request $request) 
    {
        return  $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'zip' => 'required',
                'address_line_1' => 'required',
                'city' => 'required',
                'state' => 'required',
                'email' => 'required|email',
                
            ]);

    }

    public function login(Request $request) 
    {

        $credentials = $request->only('email', 'password');
        if (is_numeric($request->get('email'))) {
            $user = User::where('phone', $request->get('email'))->first();
            if(!$user) {
                return $this->respondWithError('invalid_credentials');
            }
            $credentials['email'] = $user->email;
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->respondWithError('invalid_credentials');
            }
        } catch (JWTException $e) {
            return $this->respondInternalError('could_not_create_token');
        }

        $user = User::with('role', 'chef', 'address', 'paymentCard')->find(Auth::user()->id);

        $user = $this->userTransformer->transform($user->toArray());

        return $this->respondWithSuccess('Login success.',compact('token', 'user'));

    }

    public function logout() 
    {
        auth()->logout();
        return $this->respondWithSuccess('Logout success.');
    }

    public function passwordReset(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        $email = $request->get('email'); 
        $user = User::where('email', $email)->first();
        if (!$user) { 
            return $this->respondWithError('user with email does not exist.');

        }
        $token = $this->broker()->createToken($user); 

        $user->token = $token;

        Mail::to($email)->send(new PasswordReset($user));
        return $this->respondWithSuccess('Password reset email sent.');


    }

    public function passwordResetConfirm(Request $request) 
    {
        Password::validator(function($credentials)
        { 
            return strlen($credentials['password']) >= 1;
        });
        //dd($request->all());
        $response = $this->resetBroker()->reset(
            $request->all(), function ($user, $password) {
                
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return $this->respondWithSuccess('password reset success.');
        }else {
            return $this->respondWithError('password reset failed.');
        }   

    }

    public function imageResize($imageFile, $dir) 
    {
        $image = Image::make($imageFile->getRealPath())->encode('jpg'); 
        $image->resize(490, 300);
        $image->save(public_path($dir .'/avatar-large.jpg' ));
        $image->resize(300, 300);
        $image->save(public_path($dir .'/avatar-medium.jpg' ));
        $image->resize(50, 50);
        $image->save(public_path($dir .'/avatar-small.jpg' ));

    }

    public function registerChef(Request $request) 
    {

       

        $validator = $this->validateChef($request);  

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        $user = User::where('email', $request->get('email'))->first();
        if($user) {
            return $this->respondWithError('Email already exist.');
        }

        $user = User::where('phone', $request->get('phone'))->first();
        if($user) {
            return $this->respondWithError('Phone already exist.');
        }

        $place = ZipCode::where('zip', $request->get('zip'))->first();
        if(!$place) {
            return $this->respondWithError('not a valid US Zip code.');
        }



        //  create user role : (chef, 2)

        $user = User::createChef([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'middle_name' => $request->get('middle_name'),
            'phone' => $request->get('phone'),
            'role_id' => 2,
            'about' => $request->get('about'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);


        //create chef details
        $chef = new Chef(['chef_type_id' => $request->get('chef_type'), 'school' => $request->get('school')]);
        
        $user->chef()->save($chef);        

        //create address 
        $address =  new Address([
            'address_line_1' => $request->get('address_line_1'),
            'address_line_2' => $request->get('address_line_2'),
            'zip' => $request->get('zip'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'latitude' => $place->latitude,
            'longitude' => $place->longitude,
            'cur_latitude' => $request->get('latitude'),
            'cur_longitude' => $request->get('longitude'),
            'location' => new Point($place->latitude, $place->longitude)
        ]);

        $user->address()->save($address);

        $dir = public_path('uploads');

        if(!File::exists($dir)) {
              File::makeDirectory($dir, $mode = 0755, true, true);
        }

        if($request->hasFile('file_avatar')) {
            $userDir = 'uploads/user/'.$user->id;
            File::makeDirectory($userDir, $mode = 0755, true, true);
            $fileName = 'avatar.' . $request->file_avatar->getClientOriginalExtension();
            $this->imageResize($request->file_avatar, $userDir);
            $request->file_avatar->move(public_path($userDir), $fileName);
            $user->file_avatar = $fileName;
            $user->save();
        }

        $chef = $user->chef()->first();

        if($request->hasFile('file_govt_id')) {
            
            $userDir = 'uploads/user/'.$user->id;
            $fileName = 'file_govt_id.' . $request->file_govt_id->getClientOriginalExtension();
            $request->file_govt_id->move(public_path($userDir), $fileName);
            $chef->file_govt_id = $fileName;
            $chef->save();
        }

        if($request->hasFile('file_culinary_cert')) {
            
            $userDir = 'uploads/user/'.$user->id;
            $fileName = 'file_culinary_cert.' . $request->file_culinary_cert->getClientOriginalExtension();
            $request->file_culinary_cert->move(public_path($userDir), $fileName);
            $chef->file_culinary_cert = $fileName;
            $chef->save();
        }
        $chefaddress =Address::where('user_id', $user->id)->first();


        Mail::to($user->email)->send(new ChefCreated($user));
        Mail::to('ask@pepelechef.com')->send(new NewchefnotificationAdmin($user, $chefaddress));


        $token = JWTAuth::fromUser($user); 

        return $this->respondWithSuccess('Registered Successfully.', compact('token'));
        
    }

    public function updateProfile(Request $request) 
    {

        $validator = $this->validateProfile($request);  

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }


        $user = User::where('email', $request->get('email'))
                    ->where('id','!=',Auth::user()->id)->first();
        if($user) {
            return $this->respondWithError('Email already exist.');
        }

        $user = User::where('phone', $request->get('phone'))
                    ->where('id','!=',Auth::user()->id)->first();

        if($user) {
            return $this->respondWithError('Phone already exist.');
        }

        $place = ZipCode::where('zip', $request->get('zip'))->first();
        if(!$place) {
            return $this->respondWithError('not a valid US Zip code.');
        }
        $placestate = ZipCode::where('zip', $request->get('zip'))->where('state', $request->get('state'))->first();
        if(!$placestate) {
            return $this->respondWithError('Zip Code not matching with state.');
        }

        $user = Auth::user();
        $user->fill([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'middle_name' => $request->get('middle_name'),
            'phone' => $request->get('phone'),
            'about' => $request->get('about'),
            'email' => $request->get('email'),
        ]);
        $user->save();

        // $chef = $user->chef()->first();
        // $chef->fill([
        //     'chef_type_id' => $request->get('chef_type'),
        //     'school' => $request->get('school')]);
        // $chef->save();

        $address = $user->address->first();

        $address->fill([
            'address_line_1' => $request->get('address_line_1'),
            'address_line_2' => $request->get('address_line_2'),
            'zip' => $request->get('zip'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'latitude' => $place->latitude,
            'longitude' => $place->longitude,
            'cur_latitude' => $request->get('latitude'),
            'cur_longitude' => $request->get('longitude'),
            'location' => new Point($place->latitude, $place->longitude)
        ]);
        $address->save();

        $dir = public_path('uploads');


        if($request->hasFile('file_avatar')) {
            $userDir = 'uploads/user/'.$user->id;
            $fileName = 'file_avatar.' . $request->file_avatar->getClientOriginalExtension();
            $this->imageResize($request->file_avatar, $userDir);
            $request->file_avatar->move(public_path($userDir), $fileName);
            $user->file_avatar = $fileName;
            $user->save();
        }
    

        return $this->respondWithSuccess('Updated Successfully.', []);
        
    }



    public function registerClient(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'zip' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }
        if(!$request->hasFile('file_avatar') && $request->get('web')=='1') {
            return $this->respondWithError('Profile image required.');

        }
        $user = User::where('email', $request->get('email'))->first();
        if($user) {
            return $this->respondWithError('Email already exist.');
        }

        $user = User::where('phone', $request->get('phone'))->first();
        if($user) {
            return $this->respondWithError('Phone already exist.');
        }

        $place = ZipCode::where('zip', $request->get('zip'))->first();
        if(!$place) {
            return $this->respondWithError('not a valid US Zip code.');
        }
        $placestate = ZipCode::where('zip', $request->get('zip'))->where('state', $request->get('state'))->first();
        if(!$placestate) {
            return $this->respondWithError('Zip Code not matching with state.');
        }

        //  create client role : (client, 1)

        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'middle_name' => $request->get('middle_name'),
            'phone' => $request->get('phone'),
            'role_id' => 1,
            'about' => $request->get('about'),
            'allergies' => $request->has('allergies')?$request->get('allergies'): NULL,
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);


        //create address 
        $address =  new Address([
            'address_line_1' => $request->get('address_line_1'),
            'address_line_2' => $request->get('address_line_2'),
            'zip' => $request->get('zip'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'latitude' => $place->latitude,
            'longitude' => $place->longitude,
            'cur_latitude' => $request->get('latitude'),
            'cur_longitude' => $request->get('longitude'),
            'location' => new Point($place->latitude, $place->longitude)

        ]);
        $user->address()->save($address);

        $dir = public_path('uploads');

        if(!File::exists($dir)) {
              File::makeDirectory($dir, $mode = 0755, true, true);
        }

        if($request->hasFile('file_avatar')) {
            $userDir = 'uploads/user/'.$user->id;
            File::makeDirectory($userDir, $mode = 0755, true, true);
            $fileName = 'file_avatar.' . $request->file_avatar->getClientOriginalExtension();
            $this->imageResize($request->file_avatar, $userDir);
            $request->file_avatar->move(public_path($userDir), $fileName);
            $user->file_avatar = $fileName;
            $user->save();
        }
        $clientadd =Address::where('user_id', $user->id)->first();
//echo $clientadd;
       Mail::to($user->email)->send(new ClientCreated($user));
    //  Mail::to('ask@pepelechef.com')->send(new NewclientNotificationAdmin($user));

        $token = JWTAuth::fromUser($user); 

        return $this->respondWithSuccess('Registered Successfully.', compact('token'));
        
    }

    public function device(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'device_id' => 'required',
            'platform' => 'required',
            'os_version' => 'required',
            'device_type' => 'required',
            'device_token' => 'required', 
        ]);


        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        //$request->merge(['user_id' => Auth::user()->id]);

        $device = UserDevice::
                     where('device_id', $request->get('device_id'))
                     ->where('user_id', Auth::user()->id)->first();
        if($device) { 
            $device->update($request->all());
            return $this->respondWithSuccess('Device is updated.');

        }else {
            $device = new UserDevice($request->all());
            Auth::user()->device()->save($device);
            return $this->respondWithSuccess('New device is created.');
        }
       
    }

    public function profile(Request $request) 
    {
        $user = Auth::user();
        $user = User::with('role', 'chef', 'address', 'paymentCard')->find(Auth::user()->id)->toArray();
        $user = $this->userTransformer->transform($user); 
        return $this->respondWithSuccess('', compact('user'));

    }

    public function bootstrap() 
    {
        $version = '1.0';

        $user = (object)[];
        $pages = (object)[];

        if(Auth::user()) {
            $user = User::with('role', 'chef', 'address', 'paymentCard')->find(Auth::user()->id)->toArray();
            $user = $this->userTransformer->transform($user); 
        }

        $pages= ['faq'=>'app/faq','faqclient'=>'app/faqclient','faqchef'=>'app/faqchef','privacy'=>'app/privacy','terms'=>'app/terms'];
        return $this->respondWithSuccess('', compact('user', 'version','pages'));

    }

    public function fcm() 
    {
        SendFcm::dispatch(['user_id' => 1, 'title' => 'title', 'body' => 'body', 'payload' => ['user_id' => '3']]);
     
    }



   
}
