<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Corporatesubscriptiongroups;
use App\Customer;
use App\Corporatemeals;

class Corporatemealsweekly extends Model
{
    protected $table = 'corporate_weekly_user_meals';
    protected $primaryKey = 'id';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function group(){
        return $this->hasMany(Corporatesubscriptiongroups::class, 'reference_code','group_reference_code');
    }
    public function customer(){
        return $this->hasMany(Customer::class, 'iUserId', 'iUserId');
    }

    public function meals(){
        return $this->hasMany(Corporatemeals::class, 'id','corporate_subscriptions_meals_id');
    }

  
    
}
