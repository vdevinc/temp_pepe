<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'chef_id', 'lattitude', 'longitude'
    ];
}
