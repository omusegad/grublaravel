<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userwallet extends Model
{
    protected $table      = 'user_wallet';
    protected $primaryKey = 'iUserWalletId';

    protected $guarded = [
        'iUserWalletId',
        'updated_at',
        'created_at'
    ];
}
