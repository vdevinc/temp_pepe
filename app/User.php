<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
   


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name', 'middle_name' ,'phone', 'role_id', 'about', 'allergies' ,'file_avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['full_name', 'avatar_url', 'avatar_large_url', 'avatar_medium_url', 'avatar_small_url'];


    
    public function getFullNameAttribute()
    {
        if ($this->middle_name == null)
            return "{$this->first_name} {$this->middle_name} {$this->last_name}";
        else
            return "{$this->first_name} {$this->last_name}";
    }

    public function getAvatarUrlAttribute()
    {
        return url('uploads/user/'. $this->id. '/' . $this->file_avatar);
    }

    public function getAvatarLargeUrlAttribute()
    {
        return url('uploads/user/'. $this->id. '/avatar-large.jpg');
    }
    public function getAvatarMediumUrlAttribute()
    {
        return url('uploads/user/'. $this->id. '/avatar-medium.jpg');
    }
    public function getAvatarSmallUrlAttribute()
    {
        return url('uploads/user/'. $this->id. '/avatar-small.jpg');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function role() 
    {
        return $this->belongsTo('App\Role');

    }

    public function chef() 
    {
        return $this->hasOne('App\Chef');

    }
    public function wallet() 
    {
        return $this->hasOne('App\Wallet');

    }
    public function address() 
    {
        return $this->hasMany('App\Address');

    }

    public function paymentCard() 
    {
        return $this->hasMany('App\UserPaymentCard');
    }

    public function order() 
    {
        return $this->hasMany('App\Order');

    }

    public function device() 
    {
        return $this->hasMany('App\UserDevice');
    }

    public function dishes() 
    {
        return $this->hasMany('App\Dish');

    }

   
    

    public static function createChef($attributes) 
    { 
        $user = self::create([
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'middle_name' => $attributes['middle_name'],
            'phone' => $attributes['phone'],
            'email' => $attributes['email'],
            'role_id' => $attributes['role_id'],
            'about' => $attributes['about'],
            'password' => Hash::make($attributes['password'])
        ]);

        return $user;

    }
}