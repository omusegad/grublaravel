<?php

namespace App\Http\Controllers;
use App\Mpesatra;
use App\userwallet;
use App\Models\Orderstatuslogs;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //Mpesa callback url
    public function webhook(Request $request)
    {
        $data = file_get_contents('php://input');
        if (!$data) {
            echo "Invalid Request";
            exit;
        }
        $data = json_decode($data);
        $tmp = $data->Body->stkCallback;
        $CheckoutRequestID = $tmp->CheckoutRequestID;
        $MerchantRequestID = $data->Body->stkCallback->MerchantRequestID;
        $ResultCode  =  $tmp->ResultCode;
        $ResultDesc  =  $tmp->ResultDesc;

        $master = array();
        foreach ($data->Body->stkCallback->CallbackMetadata->Item as $item) {
            $item = (array)$item;
            $master[$item['Name']] = ((isset($item['Value'])) ? $item['Value'] : NULL);
        }

        $master = (object)$master;    
        if (!empty($tmp->ResultCode) == 0) {
            $data = array(
                'phoneNumber'         => $master->PhoneNumber,
                "Amount"              => $master->Amount,
                "ResultCode"          => $ResultCode,
                "ResultDesc"          => $ResultDesc,
                "CheckoutRequestID"   => $CheckoutRequestID,
                "MerchantRequestID"   => $MerchantRequestID,
                "ResponseDescription" => "PROCESSED",
                "paymentStatus"       => "PAID",
                "MpesaReceiptNumber"  => $master->MpesaReceiptNumber
            );
             
            $update = $this->UpdateTransaction($data);
            if($update == 1){
                 // find if MpesaReceiptNumber exist 
                $record = Mpesatra::select('MpesaReceiptNumber','iOrderId')->where('MpesaReceiptNumber',  $data["MpesaReceiptNumber"])->get();
                Orderstatuslogs::where('iOrderId',  $record[0]->iOrderId)
                    ->update([
                        'iStatusCode' => 1,
                ]);
            }
            //return  $record[0]->MpesaReceiptNumber;
            //$this->updateUserwallet($data);
        }
     
    }

    //update mpesa transaction
    private function UpdateTransaction($data){
        Mpesatra::where('CheckoutRequestID', $data["CheckoutRequestID"])->update([
            'MerchantRequestID'	  => $data['MerchantRequestID'],
            'phoneNumber'         => $data['phoneNumber'],
            'CheckoutRequestID'	  => $data['CheckoutRequestID'],
            'ResultCode'          => $data['ResultCode'],
            'ResultDesc'          => $data['ResultDesc'],
            'Amount'	          => $data['Amount'],
            'paymentStatus'       => $data['paymentStatus'],
            'MpesaReceiptNumber'  => $data['MpesaReceiptNumber'],
            'ResponseDescription' => $data['ResponseDescription']
        ]);


    }

    //works well just plugin
    private function updateUserallet($data){
        userwallet::where('iUserId', $data["iUserId"] )
            ->update([
                'iBalance'   => $data['Amount'],
                'eFor'       => 'Deposit',
                'eUserType'  => 'Passanger',
                'eType'      => 'Credit',
                ]);
    }

    
}
