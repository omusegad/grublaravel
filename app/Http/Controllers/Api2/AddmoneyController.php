<?php

namespace App\Http\Controllers\Api;
use App\Userwallet;
use Illuminate\Http\Request;
use App\Http\Requests\GrupRequest;

use App\Http\Controllers\Controller;
class AddmoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmoney(Request $request)
    {
        // $validatedData = $request->validate([
        //     'action'             => 'required',
        //     'type'               => 'required',
        //     'phoneNumber'        => 'required',
        //     'addMoneyUserWallet' => 'required',
        //     'amount'             => 'required',
        //     'iUserId'            => 'required',
        //     'eUserType'          => 'required'
        //     ]);


        // return $request->all(); rider is like a customer
         if($request['eUserType'] === 'Passanger'){
            $data = Userwallet::create([
                'iUserId'        => $request['iUserId'],
                'eUserType'      => 'Rider',
                'iBalance'       => $request['amount'],
                'iTripId'        => 0,
                'dDate'          =>  Date('Y-m-d H:i:s'),
                'tDescription'   => '#LBL_AMOUNT_CREDIT#',
                'fromUserType'   => 'Rider',
                'iTransactionId' => '',
                'fromUserId'     => 0,
                'iOrderId'       => 0,
            ]);

            if($data){
                // $getcredit = Userwallet::where( 'iUserId', '=',  $data->iUserId)
                //     ->where('eType', '=', 'Credit')->get();
                // $totalCredit = sum($getcredit['iBalance']);
                return response([
                    'response_code' => '200',
                    'message'       => 'User Wallet Topup Successful'
                    ]);
                exit;
            }



         }
         //return "Driver"; // Driver is just a driver/delivery guy

        //$wallet = new Userwallet();

    }

  


}
