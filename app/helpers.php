<?php

use App\Customer;
use App\Loyalty;
use App\Models\Userwallet;

use AfricasTalking\SDK\AfricasTalking;

//Total Points Calculations
if (!function_exists('pointBalance')) {
    function pointBalance($id){
        $pointBalance = (totalCredit($id))-(totalDebit($id));
        return $pointBalance;
    }
}

//Total Debit Calculations
if (!function_exists('totalCredit')) {
    function totalCredit($id){
         return Loyalty::where('iUserId', '=', $id)
        ->where('redeemStatus', '=', 'CREDIT')
        ->sum('pointsAmount');
    }
}

//Total Debit Calculations
if (!function_exists('totalDebit')) {
    function totalDebit($id){
         return Loyalty::where('iUserId', '=', $id)
        ->where('redeemStatus', '=', 'DEBIT')
        ->sum('pointsAmount');
    }
}

//Send sms helper
if (!function_exists('sendGroupSms')) {
    function sendGroupSms($PhoneNumber, $message){
        $username = env('AFARICASTALKING_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('AFARICASTALKING_APIKEY');  // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);
        $sms      = $AT->sms();
        $senderId = env('AFARICASTALKING_SENDERID'); //GRUB';

        // Use the service
        $result   = $sms->send([
            'from'    => $senderId,
            'to'      => $PhoneNumber,
            'message' => $message
        ]);
        return $result;
    }
}


///=================================///
//Calculate Total Wallet Balance
///================================//
if (!function_exists('walletBalance')) {
    function walletBalance($id)
    {
      $walletBalance = (walletCredit($id))-(walletDebit($id));
        return $walletBalance;

    }
}

//Total Credit Calculations
if (!function_exists('walletCredit')) {
    function walletCredit($id){
         return Userwallet::where('iUserId', '=', $id)
        ->where('eType', '=', 'Credit')
        ->sum('iBalance');
    }
}

//Total Debit Calculations
if (!function_exists('walletDebit')) {
    function walletDebit($id){
         return Userwallet::where('iUserId', '=', $id)
        ->where('eType', '=', 'Debit')
        ->sum('iBalance');
    }
}




