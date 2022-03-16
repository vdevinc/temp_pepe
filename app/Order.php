<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'dish_id', 'dish_service_type_id', 'no_of_people', 'price', 'net_price', 'txn_fee', 'sales_tax', 'is_approved', 'is_rejected', 'time_slot'
    ];

    public function getChefFee() 
    {
        return $this->dish->calculateChefFee($this->no_of_people);

    }

    public function getPrice() 
    {
        return $this->dish->calculatePrice($this->no_of_people); 

    }

    public function service_type() 
    {
        return $this->belongsTo('App\DishServiceType', 'dish_service_type_id' );

    }

    public function dish() 
    {
        return $this->belongsTo('App\Dish', 'dish_id' );

    }

    public function rating() 
    {
        return $this->hasMany('App\OrderRating');

    }
    
    
    public function user() 
    {
        return $this->belongsTo('App\User', 'user_id' );

    }
    public function address() 
    {
        return $this->belongsTo('App\Address');

    }
}
