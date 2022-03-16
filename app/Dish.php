<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'cuisine_type', 'dish_service_type_id', 'hours', 'cost', 'story',
         'ingredients', 'courses', 'file_picture', 'rating', 'is_approved'
    ];

    protected $appends = ['picture','picture_large','picture_medium', 'picture_small', 'url', 'price'];


    public function getPictureAttribute()
    {
        if($this->file_picture)
            return url('uploads/dish/'. $this->id. '/' . $this->file_picture);
        else 
            return null;    
    }
    public function getPictureLargeAttribute()
    {
        if($this->file_picture)
            return url('uploads/dish/'. $this->id. '/picture-large.jpg');
        else 
            return null;    
    }
    public function getPictureMediumAttribute()
    {
        if($this->file_picture)
            return url('uploads/dish/'. $this->id. '/picture-medium.jpg');
        else 
            return null;    
    }
    public function getPictureSmallAttribute()
    {
        if($this->file_picture)
            return url('uploads/dish/'. $this->id. '/picture-small.jpg');
        else 
            return null;    
    }

    

    

    public function getUrlAttribute()
    {
        return url('dish/'. $this->id);
       
    }

    public function service_type() 
    {
        return $this->belongsTo('App\DishServiceType', 'dish_service_type_id' );

    }

    public function getPriceAttribute()
    {
        return $this->calculatePrice(1);  
    }

    public function user() 
    {
        return $this->belongsTo('App\User');

    }

    public function address() 
    {
        return $this->belongsTo('App\Address');

    }

    public function order() 
    {
        return $this->hasMany('App\Order');

    }

    public function ratings()
    {
        return $this->hasManyThrough('App\OrderRating', 'App\Order');
    }

    public function updateRating($rating) 
    {
       $currentRating = $this->rating == 0.0 ? 5.0:$this->rating;
       $this->rating =  ( $currentRating  + $rating) / 2;
       $this->save();
    }

    public function calculatePrice($noOfPeople) 
    {
        $chefFee = 75;
        $surcharge = 0;

        if($noOfPeople > 3 && $noOfPeople <= 6)   
            $chefFee += 90;
        elseif($noOfPeople > 6) {
            $chefFee = 90;
            $groupsOfFour = ceil( ($noOfPeople - 6) / 4);
            $chefFee +=  (50 * $groupsOfFour);                    
        }

        if($this->hours > 180) {
            $surcharge = ceil(($this->hours - 180) / 60) * 50;
        }

        $price = ($this->cost * 3 ) * $noOfPeople + $chefFee + $surcharge;  
        return $price;

    }

    public function calculatePriceBreakdown($noOfPeople) 
    {

        $price = $this->calculatePrice($noOfPeople);
        $salesTax =  ($price * 7) / 100;
        $txnFee = ($price * 3) / 100  + 1.3;
        $netPrice = $price + $salesTax + $txnFee;
        $netPrice = round($netPrice * 100) /100;
        return [
            'price' => $price,
            'txn_fee' => $txnFee,
            'sales_tax' => $salesTax,
            'net_price' => $netPrice
        ];
        
    }

    public function calculateChefFee($noOfPeople) 
    {
        $chefFee = 75;

        if($noOfPeople > 3 && $noOfPeople <= 6)   
            $chefFee += 90;
        elseif($noOfPeople > 6) {
            $chefFee = 90;
            $groupsOfFour = ceil( ($noOfPeople - 6) / 4);
            $chefFee +=  (50 * $groupsOfFour);                    
        }

        return $chefFee;

    }
    

}
