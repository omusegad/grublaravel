<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Corporatesubscriptiongroups;
use App\Customer;

class Corporateusers extends Model
{
    protected $table = 'corporate_users';
    protected $primaryKey = 'id';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function group(){
        return $this->hasMany(Corporatesubscriptiongroups::class, 'reference_code','reference_code');
    }

    public function customer(){
        return $this->hasMany(Customer::class, 'iUserId', 'iUserId');
    }
    

}
