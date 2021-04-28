<?php

namespace App\Models;
use App\Models\Deliveryservice;

use Illuminate\Database\Eloquent\Model;

class Itemstype extends Model
{
    protected $table = 'cuisine';
    protected $primaryKey = 'cuisineId';

    // relationship with store model
    public function deliveryservice()
    {
        return $this->hasMany(Deliveryservice::class, 'iServiceId','iServiceId');
    }
}
