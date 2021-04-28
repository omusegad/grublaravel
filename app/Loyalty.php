<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loyalty extends Model
{
    //
    protected $table = 'loyaltypoints';
    protected $fillable = [
        'iUserId','name', 'pointsAmount','redeemStatus'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'iUserId', 'id');
    }
}
