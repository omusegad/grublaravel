<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orderstatus;
use App\Models\Orderstatuslogs;
use App\Models\Deliveryservice;

class Orders extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'iOrderId';

    //add main service relationship i.e food, wine
    public function deliveryservice()
    {
        return $this->hasOne(Deliveryservice::class, 'iServiceId','iServiceId');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'iCompanyId','iCompanyId');
    }

    public function driver()
    {
       return $this->hasOne(Driver::class, 'iDriverId','iDriverId');
    }

    public function customer()
    {
       return $this->belongsTo(Customer::class, 'iUserId','iUserId');
    }

    public function cutomeraddress()
    {
       return $this->hasOne(Cutomeraddress::class, 'iUserAddressId','iUserAddressId');
    }

    public function orderstatus()
    {
        return $this->hasOne(Orderstatus::class, 'iStatusCode', 'iStatusCode');
    }

    public function orderlogs()
    {
        return $this->hasMany(Orderstatuslogs::class, 'iOrderId', 'iOrderId');

    }

    //Order Status updates
    //  public function orderStatu()
    // {
    //    return $this->hasOne(Orderstatus::class, 'iUserAddressId','iUserAddressId');
    // }



}
