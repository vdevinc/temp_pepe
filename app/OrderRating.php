<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRating extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'dish_rating', 'dish_review', 'chef_rating', 'chef_review','is_approved',
        'is_rejected'
    ];  

    public function order() 
    {
        return $this->belongsTo('App\Order');

    }
  

}
