<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpesatra extends Model
{
    protected $table = 'mpesaTras';
    protected $primaryKey = 'transId';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
}
