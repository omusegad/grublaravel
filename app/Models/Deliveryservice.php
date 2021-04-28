<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliveryservice extends Model
{
    protected $table        = 'service_categories';
    protected $primaryKey   = 'iServiceId';
    public $incrementing    = false;
    public    $timestamps   = false;
    protected $guarded      = ['iServiceId'];

}
