<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Dish;
use App\ZipCode;

use App\Transformers\DishTransformer;
use App\Transformers\UserTransformer;
use App\Mail\DishCreated;
use App\Mail\NewdishnotificationAdmin;

use Grimzy\LaravelMysqlSpatial\Types\Point;
use Intervention\Image\ImageManagerStatic as Image;



use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



use App\Http\Controllers\Controller;


class DishController extends ApiController
{
    public function __construct(UserTransformer $userTransformer, DishTransformer $dishTransformer) 
    {
        $this->userTransformer = $userTransformer;
        $this->dishTransformer = $dishTransformer;
    }

    public function imageResize($imageFile, $dir) 
    {
        $image = Image::make($imageFile->getRealPath())->encode('jpg'); 
        $image->resize(490, 300);
        $image->save(public_path($dir .'/picture-large.jpg' ));
        $image->resize(300, 300);
        $image->save(public_path($dir .'/picture-medium.jpg' ));
        $image->resize(50, 50);
        $image->save(public_path($dir .'/picture-small.jpg' ));

    }

    public function store(Request $request) 
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'cuisine_type' => 'required',
            'dish_service_type_id' => 'required',
            'hours' => 'required',
            'cost' => 'required',
            'story' => 'required',
            'ingredients' => 'required',
        ]);


        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        //$attributes = []


        $request->merge(['user_id' => Auth::user()->id]);

        $dish = Dish::create($request->except('file_picture'));

        if($request->hasFile('file_picture')) {
            $dir = 'uploads/dish/'.$dish->id;
            File::makeDirectory($dir, $mode = 0755, true, true);

            $fileName =  'picture.' . $request->file_picture->getClientOriginalExtension();
            // $request->file_picture->move(public_path($userDir), $fileName);

            $dish->file_picture = $fileName; 
            $dish->save();            

            //save resized images as jpg
            $this->imageResize($request->file_picture, $dir);
            //save original pic
            $request->file_picture->move(public_path($dir), $fileName);


        }

        Mail::to(Auth::user()->email)->send(new DishCreated($dish));
                Mail::to('ask@pepelechef.com')->send(new NewdishnotificationAdmin($dish));

        return $this->respondWithSuccess('Dish created successfully.', []);

    }

    public function update(Request $request, $id) 
    {
        
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'cuisine_type' => 'required',
            'dish_service_type_id' => 'required',
            'hours' => 'required',
            'cost' => 'required',
            'story' => 'required',
            'ingredients' => 'required',
            'file_picture' => 'required',
        ]);


        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }

        $dish = Dish::find($id);

        if(!$dish) {
            return $this->respondWithError('Dish does not exist!');
        }

        if($dish->user_id != Auth::user()->id) {
            return $this->respondWithError('No permission to edit!');
        }


        $dish = $dish->fill($request->except('file_picture'));

        $dish->save();

        if($request->hasFile('file_picture')) {
            $userDir = 'uploads/dish/'.$dish->id;
            $fileName =  'picture.' . $request->file_picture->getClientOriginalExtension();
            //$request->file_picture->move(public_path($userDir), $fileName);

            $dish->file_picture = $fileName; 
            $dish->save();

            //save resized images as jpg
            $this->imageResize($request->file_picture, $userDir);
            //save original pic
            $request->file_picture->move(public_path($userDir), $fileName);

        }

        return $this->respondWithSuccess('Dish updated successfully.', []);



    }

    public function show(Request $request, $id) 
    { 
        $dish = Dish::with('user', 'user.chef', 'ratings.order.user')->find($id);
        if(!$dish) {
             return $this->respondWithError('Dish does not exist!');
        }
        $dish = $this->dishTransformer->transform($dish->toArray());
        return $this->respondWithSuccess('', compact('dish'));

    }

    public function list() 
    {
        $dishes = Dish::with('service_type')->where('user_id', Auth::user()->id)->where('is_approved','1')->get();
        $dishes = $this->dishTransformer->transformCollection($dishes->toArray());
        return $this->respondWithSuccess('', compact('dishes'));

    }

    public function search(Request $request) 
    { 
        $dishes = Dish::with('user', 'user.chef');

        if($request->filled('zip')) {

            $place = ZipCode::where('zip', $request->get('zip'))->first();
            if($place) {
                $dishes = $dishes->whereHas('user.address', function($query) use($place){
                    $location = new Point($place->latitude, $place->longitude);
                    $query->DistanceSphere('location',$location, 60*1609.344);
                });
            }else {
                $dishes = [];
                return $this->respondWithSuccess('', compact('dishes'));  
            }

        }    

        if($request->filled('name')) {
            $dishes = $dishes->where('name', 'like','%'.$request->get('name').'%');
        }  
                   
        $dishes = $dishes->where('is_approved', 1)->get(); 
        $dishes = $this->dishTransformer->transformCollection($dishes->toArray()); 
        return $this->respondWithSuccess('', compact('dishes'));

    }

    public function searchChef(Request $request) 
    {
        $chefs = User::whereHas('chef', function ($query) {
            $query->where('is_approved', 1);
        });

        if($request->filled('zip')) {

            $place = ZipCode::where('zip', $request->get('zip'))->first();

            if($place) {
                $chefs=  $chefs->whereHas('address' ,function ($query) use ($place){
                $location = new Point($place->latitude, $place->longitude);
                $query->DistanceSphere('location',$location, 60*1609.344);
                });
            }else {
                $chefs = [];
                return $this->respondWithSuccess('', compact('chefs'));  
            }

        }
        if($request->filled('name')) {
            $chefs = $chefs->where('first_name', 'like','%'.$request->get('name').'%');
        } 
        
        $chefs = $chefs->with('address','dishes')->where('role_id', 2)->get();

        $chefs = $this->userTransformer->transformCollection($chefs->toArray());

        return $this->respondWithSuccess('', compact('chefs'));


    }

}
