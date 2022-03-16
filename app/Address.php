<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;



class Address extends Model
{

   use SpatialTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address_line_1', 'address_line_2', 'zip', 'city' , 'state', 'latitude', 'longitude','cur_latitude','cur_longitude','location'
    ];

    protected $spatialFields = [
        'location',
    ];

    //$location = new Point(4.7484404, -73.98784441);

    //Address::DistanceSphere('location',$location, 90000)->get()

    // public function scopeCloseTo( $latitude, $longitude)
    // {
    //     //return DB::table('addresses')->whereRaw("state='eer'");
    //     return DB::table('addresses')->whereRaw("
    //     ST_Distance_Sphere(
    //             point(longitude, latitude),
    //             point(?, ?)
    //         ) * .000621371192 < 2000
    //     ", [
    //         $longitude,
    //         $latitude,
    //     ]);
    // }
}
