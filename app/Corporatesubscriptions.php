<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporatesubscriptions extends Model
{
    protected $table = 'corporate_subscriptions';
    protected $primaryKey = 'id';

    protected $fillable = ['subscriptions_name', 'location',  'locationLong',  'locationLat',  'email', 'phoneNumber', 'subscriptions_image_url'];


    public function corporatemeals()
    {
        return $this->hasMany(Corporatemeals::class, 'corporate_subscriptions_id','id');
    }

}
