<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'balance'
    ];    
    

    public function deposite($amount, $orderId, $remarks = '') 
    {
        $this->transaction()->create(['amount' => $amount, 'order_id' => $orderId, 'remarks' => $remarks]);
        $this->balance += $amount;
        $this->save();

    }

    public function transaction() 
    {
        return $this->hasMany('App\WalletTransaction');

    }
}
