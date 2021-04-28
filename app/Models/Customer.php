<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table       = 'register_user';
    protected $primaryKey  = 'iUserId';
    protected $guarded     = ['iUserId'];
    public $timestamps     = false;

    //add main service relationship i.e food, wine
    public function userwallet()
    {
        return $this->hasMany(Userwallet::class, 'iUserId', 'iUserId');
    }

    public function loyalty()
    {
        return $this->hasMany(Loyalty::class, 'id', 'iUserId');
    }
}
