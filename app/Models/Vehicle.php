<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table      = 'driver_vehicle';
    protected $primaryKey = 'iDriverVehicleId';


    public function driver()
    {
        return $this->hasOne(Driver::class, 'iDriverId','iDriverId');
    }

    public function vehiclemake()
    {
        return $this->hasOne(Vehiclemake::class, 'iMakeId','iMakeId');
    }

    public function vehiclemodel()
    {
        return $this->hasOne(Vehiclemodel::class, 'iModelId','iModelId');
    }


}
