<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $table = 'menu_items';
    protected $primaryKey = 'iMenuItemId';


    // relationship with store model 
    public function itemcategories()
    {
        return $this->hasMany(Itemcategories::class, 'iFoodMenuId','iFoodMenuId');
    }
}
