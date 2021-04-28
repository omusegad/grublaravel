<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderstatuslogs extends Model
{
    protected $table      = 'order_status_logs';
    protected $primaryKey = 'iOrderLogId';


    public function orders()
    {
        return $this->belongsTo(Orders::class, 'iStatusCode', 'iStatusCode');

    }
}
