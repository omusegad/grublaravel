<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemcategories extends Model
{
    protected $table = "food_menu";
    protected $primaryKey = "iFoodMenuId";
    protected $guarded = [];

    //add Store relationship i.e kfc
    public function store()
    {
        return $this->hasMany(Store::class, 'iCompanyId','iCompanyId');
    }
}
