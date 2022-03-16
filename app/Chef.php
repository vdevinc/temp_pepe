<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chef_type_id', 'school', 'rating', 'file_govt_id', 'file_culinary_cert', 'is_approved', 'is_agrmt_signed'
    ];

    protected $appends = ['file_govt_id_path'];


    public function getFileGovtIdPathAttribute() 
    {
        return 'uploads/user/'.$this->user_id.'/'.$this->file_govt_id;

    }

    public function user() 
    {
        return $this->belongsTo('App\User');

    }

    public function updateRating($rating) 
    {
       $currentRating = $this->rating == 0.0 ? 5.0:$this->rating;
       $this->rating =  ( $currentRating  + $rating) / 2;
       $this->save();
    }

    // /**
    //  * Get the user's address.
    //  */
    // public function userAddress()
    // {
    //     return $this->hasManyThrough('App\Address', 'App\User', 'id', 'user_id');
    // }

    
}
