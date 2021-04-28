<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corporateorders extends Model
{
    protected $table      = 'corporate_weekly_user_meals';
    protected $primaryKey = 'id';

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // public function group()
    // {
    //     return $this->belongsTo(Corporatesubscriptiongroups::class, 'group_reference_code', 'reference_code');
    // }
    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class, 'iUserId', 'iUserId');
    // }

    // public function meals(){
    //     return $this->belongsTo(Corporatemeals::class, 'corporate_subscriptions_meals_id', 'id');
    // }
}
