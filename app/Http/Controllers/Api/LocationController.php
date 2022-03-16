<?php

namespace App\Http\Controllers\Api;

use App\Location;
use Illuminate\Http\Request;
use Validator;

use App\Http\Controllers\Controller;

class LocationController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chef_id' => 'required',
            'lattitude' => 'required',
            'longitude' => 'required'
        ]);


        if($validator->fails()) {
            return $this->respondWithError('invalid_inputs', $validator->errors());
        }
            $chef_id        =   $request->get('chef_id');
            $lattitude      =   $request->get('lattitude');
            $longitude      =   $request->get('longitude');
            // $chef_id=2;
            // $lattitude='23.5756765';
            //  $longitude='35.354365';
            $chefLocation   =   Location::where('chef_id',$chef_id)->first();

            if(!$chefLocation){

                $location = Location::create([
                'chef_id'     => $request->get('chef_id'),
                'lattitude'   => $lattitude,
                'longitude'   => $longitude
                
                ]);

            }else{

                 $chefLocation->lattitude=$lattitude;
                 $chefLocation->longitude=$longitude;
                 $chefLocation->save();
            }

        return $this->respondWithSuccess('successfully updated.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($chef_id)
    {
        $chefLocation   =   Location::where('chef_id',$chef_id)->first();

       return $this->respondWithSuccess('', compact('chefLocation') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
