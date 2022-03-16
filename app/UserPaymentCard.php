<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaymentCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'customer_id', 'status'
    ];
}
