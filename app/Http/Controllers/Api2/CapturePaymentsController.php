<?php

namespace App\Http\Controllers\Api2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CapturePaymentsController extends Controller
{

    public function store(Request $request)
    {
        $data = request()->all();
        return  $data;
        // $data = $request->validate([
        //    'action'           => 'required',
        //    'iOrderId'         => 'required',
        //    'ePaymentOption'   => 'required',
        //    'CheckUserWallet'  => 'required',
        //    'iUserId'          => 'required',
        //    'vPayMethod'       => 'required',
        // ]);
        // return $data;
    }


 
}
