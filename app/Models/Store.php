<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table      = 'company';
    protected $primaryKey = 'iCompanyId';

    //add main service relationship i.e food, wine
    public function deliveryservice()
    {
        return $this->belongsTo(Deliveryservice::class, 'iServiceId','iServiceId');
    }

    //add  Store relationship i.e kfc
    // public function itemcategories()
    // {
    //     return $this->belongsTo(ItemCategories::class, 'iCompanyId','iCompanyId');
    // }
}
