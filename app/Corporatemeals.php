<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporatemeals extends Model
{
    protected $table      = 'corporate_subscriptions_meals';
    protected $primaryKey = 'id';

    protected $fillable   = ['corporate_subscriptions_id', 'meal_name',  'meal_image_ur',  'description',  'inStock', 'price'];

    public function corporatesubscriptions()
    {
        return $this->belongsTo(Corporatesubscriptions::class, 'corporate_subscriptions_id','id');
    }

}
