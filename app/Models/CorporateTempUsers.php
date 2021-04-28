<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorporateTempUsers extends Model
{
    protected $table = 'corporategroup_temporary_users';
    protected $primaryKey = 'id';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
}
