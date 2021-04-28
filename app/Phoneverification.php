<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phoneverification extends Model
{
    protected $table      = 'phoneverification';
    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];
    
}