<?php

namespace App;
use App\Models\Corporateusers;

use Illuminate\Database\Eloquent\Model;

class Corporatesubscriptiongroups extends Model
{
    protected $table = 'corporate_subscriptions_groups';
    protected $primaryKey = 'id';
    protected $guarded = ['id','created_at', 'updated_at'];

    public function corporatesubscriptions()
    {
        return $this->belongsTo(Corporatesubscriptions::class, 'corporate_subscriptions_id', 'id');
    }

    public function corporateusers()
    {
        return $this->hasMany(Corporateusers::class, 'reference_code', 'reference_code');
    }

    
}
