<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    protected $table      = 'order_status';
    protected $primaryKey = 'iOrderStatusId';

     protected $guarded = [
         'created_at','updated_at'
     ];

    public function orderlogs(){
        return $this->hasMany(Orderstatuslogs::class, 'iStatusCode', 'iStatusCode');

    }


    // public function belongsTo()
    // {
    //     return $this->hasOneThrough('Orderstatus::class', 'Orders::class');
    // }




}
