<?php

namespace App\Http\Controllers\Api;

use App\Chef;
use App\Dish;
use App\User;
use App\Address;
use App\ZipCode;

use App\Transformers\UserTransformer;
use App\Transformers\DishTransformer;

use Grimzy\LaravelMysqlSpatial\Types\Point;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChefController extends ApiController
{

    public function __construct(UserTransformer $userTransformer, DishTransformer $dishTransformer) 
    {
        $this->userTransformer = $userTransformer;
        $this->dishTransformer = $dishTransformer;

    }

    public function show(Request $request, $id) 
    { 
        $chef= User::find($id); 

        if(!$chef) {
             return $this->respondWithError('Chef does not exist!');
        }

        $dishes = $chef->dishes()->get(); 

        $chef = $this->userTransformer->transform($chef->toArray());
        $dishes = $this->dishTransformer->transformCollection($dishes->toArray());

        $chef['dishes'] = $dishes;

        return $this->respondWithSuccess('', compact('chef'));

    }

    public function search(Request $request) 
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
        
        $chefs = $chefs->with('address','chef')->where('role_id', 2)->get();

        $chefs = $this->userTransformer->transformCollection($chefs->toArray());

        return $this->respondWithSuccess('', compact('chefs'));

    }
}
