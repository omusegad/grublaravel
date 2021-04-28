<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use App\Deliveryservice;
use App\User;
use App\Store;
use App\Userwallet;
use App\Payment;
use App\Mpesatra;
use App\Models\Corporatemealsweekly;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GapiController extends Controller{
    //Perform stk push to safcom possible action types { STK_PUSH_REQUEST and WALLET }
    public function grubpay(Request $request){
        $data = $request->validate([
          'action'              => 'required',
           // 'iOrderId'            => 'sometimes|required',
           // 'CheckoutRequestID'   => 'sometimes|required',
        ]);
        $action = $data['action'];
        switch ($action) {
            case $action == "WALLET":
                    $payData = $request->all();
                break;
                case $action == "STK_PUSH_REQUEST":
                    $payData = $request->all();
                break;
                    case $action == "CORPORATE_PAY":
                    $payData = $request->all();
                break;
            default:
                return response([
                    'responce_code' => '401',
                    'message' => 'Invalid Action',
                ]);
                exit;
        }


            $token = json_decode($this->mpesa_access_token());
            $genToken = $token->access_token;
            date_default_timezone_set("Africa/Nairobi");
            $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

            $BusinessShortCode = '973721';  // '174379';;
            $amount = (float)$payData['amount'];
            $Amount = round($amount);
            $PhoneNumber = $payData['phoneNumber'];
            $TransactionType = 'CustomerPayBillOnline';
            $PartyA =  $PhoneNumber;
            $PartyB =  $BusinessShortCode;
            $msisdn =  (int)$PhoneNumber;
            $AccountReference = 'GRUB';// $msisdn;
            $TransactionDesc = 'Grub Delivery';
            $CallBackURL = 'https://grub.ke/glab/webhook';
            $passkey  =  '2cb23f63dd60494f136bcd0fe83d3094989e50192b2f34b3b8516ae90bd9f017'; //production passkey
            $TIMESTAMP = new \DateTime();
            $timestamp = $TIMESTAMP->format('Ymdhis'); //'20180814085620';
            $passstring = $BusinessShortCode.$passkey.$timestamp;
            $password  = base64_encode($passstring);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$genToken));
            $curl_post_data = array(
                'BusinessShortCode' => $BusinessShortCode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => $TransactionType,
                'Amount' => $Amount,
                'PartyA' => $PartyA,
                'PartyB' => $PartyB,
                'PhoneNumber' => $msisdn,
                'CallBackURL' => $CallBackURL,
                'AccountReference' => $AccountReference,
                'TransactionDesc' => $TransactionDesc
            );
           // return $curl_post_data;
            $data_string = json_encode($curl_post_data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_HEADER, false);
            $curl_response = curl_exec($curl);
           // return  $curl_response;
            $decodere = json_decode($curl_response);
            // echo  $decodere->errorCode;
            // exit;
            if (!empty($decodere->errorCode) == "500.001.1001"){
                return response([
                    'responce_code' => '403',
                    'message'       => 'Please use valid safaricom phonenumber'
                ]);
            }

            if(!empty($decodere->ResponseCode) == 0){
                $data = [
                    'MerchantRequestID'   => $decodere->MerchantRequestID,
                    'phoneNumber'         => $payData['phoneNumber'],
                    'iUserId'             => $payData['iUserId'],
                    'iCompanyId'          => $payData['iCompanyId'],
                    'iOrderId'            => $payData['iOrderId'],
                    'GeneralUserType'     => $payData['GeneralUserType'],
                    'GeneralDeviceType'   => $payData['GeneralDeviceType'],
                    'vPaymentMethod'      => $payData['vPaymentMethod'],
                    'payType'             => $payData['action'],
                    'CheckoutRequestID'   => $decodere->CheckoutRequestID,
                    'ResponseDescription' => $decodere->ResponseDescription,
                ];
                //return  $data;
                $userType = $data['payType'];
                switch ($userType) {
                    case $userType == "STK_PUSH_REQUEST":
                         $data['payType'] = 'ORDER';
                        break;
                        case $action == "WALLET":
                         $data['payType']    = 'WALLET';
                         $data['iCompanyId'] = '0';
                         $data['iOrderId']   = 'W';
                        break;
                        case $action == "CORPORATE_PAY":
                         $data['payType'] = 'CORPORATE_PAY';
                        break;
                    default:
                        return response([
                            'responce_code' => '401',
                            'message' => 'Invalid Action',
                        ]);
                        exit;
                }
                $saveData = $this->SaveTransaction($data);
                if($saveData){
                    return response([
                        'responce_code' => '200',
                        'CheckoutRequestID' => $data['CheckoutRequestID'],
                        'success' => 'STK Push Successfully'
                    ]);
                }

                 //return $data;
                $orderId = Mpesatra::where('iOrderId', $data['iOrderId'])->first();
                if($orderId["paymentStatus"] == "FAILED"){
                  //update failed transaction
                  Mpesatra::where('iOrderId', $orderId["iOrderId"] )
                    ->update([
                        'MerchantRequestID'   =>  $data['MerchantRequestID'],
                        'iUserId'             =>  $data['iUserId'],
                        'phoneNumber'         =>  $data['phoneNumber'],
                        'iCompanyId'          =>  $data['iCompanyId'],
                        'iOrderId'            =>  $data['iOrderId'],
                        'GeneralUserType'     =>  $data['GeneralUserType'],
                        'GeneralDeviceType'   =>  $data['GeneralDeviceType'],
                        'CheckoutRequestID'   =>  $data['CheckoutRequestID'],
                        'vPaymentMethod'      =>  $data['vPaymentMethod'],
                        'ResponseDescription' =>  $data['ResponseDescription'],
                     ]);
                     return response([
                        'responce_code' => '200',
                        'success' => 'Record updated Successfully'
                    ]);
                    exit;
                }else{
                    $this->SaveTransaction($data);//works fine
                }

            }

    }

    //generate stk push token
    private function mpesa_access_token(){

        $mpesaConsumerKey = "wHPCuEn8eUKxVdhbgYbRu03wTYEtAug1";
        $mpesaConsumerSecret = "PDNjCcobKHILjFK5";
        $credentials = base64_encode($mpesaConsumerKey.':'.$mpesaConsumerSecret);
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($mpesaConsumerKey.':'.$mpesaConsumerSecret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        curl_close($curl);
        if($response){
            return $response;
        }else{
            return response()->json(['Message' => 'Token Gen Error']);
        }

    }



    //insert mpesa transaction to DB
    private function SaveTransaction($data){
        return Mpesatra::Create([
            'iOrderId'             => $data['iOrderId'],
            'MerchantRequestID'    => $data['MerchantRequestID'],
            'phoneNumber'          => $data['phoneNumber'],
            'iUserId'              => $data['iUserId'],
            'iCompanyId'           => $data['iCompanyId'],
            'GeneralUserType'      => $data['GeneralUserType'],
            'GeneralDeviceType'    => $data['GeneralDeviceType'],
            'CheckoutRequestID'    => $data['CheckoutRequestID'],
            'vPaymentMethod'       => $data['vPaymentMethod'],
            'payType'              => $data['payType'],
            'ResponseDescription'  => $data['ResponseDescription']
        ]);
    }

    //check mpesa payment if successful
    public function checkMtransaction(Request $request){
        // request must have Either => iOrderId or CheckoutRequestID but not both
         $data = $request->validate([
            'action'              => 'required',
            'iOrderId'            => 'sometimes|required',
            'CheckoutRequestID'   => 'sometimes|required',
        ]);

        $action = $data['action'];
        switch ($action) {
            case $action == "STK_PAY_STATUS":
               if(!empty($data['iOrderId'])) {
                    $orderId = Mpesatra::select('iOrderId','paymentStatus')->where('iOrderId', '=', $data['iOrderId'])->get();
                        if($orderId[0]['paymentStatus'] == "PAID") {
                            $corderId = $orderId[0]['iOrderId'];
                            $updateCorporateOrders = Corporatemealsweekly::where('orderID', $corderId)->get();
                            foreach($updateCorporateOrders as $key => $kyc){
                                $this->updateCorporateOrders($corderId);
                            }
                            return response()->json([
                                'response_code' => '200',
                                'paymentStatus' => 'PAID',
                            ]);
                            exit;
                        }else{
                            return response()->json([
                                'response_code' => '200',
                                'paymentStatus' => 'FAILED',
                            ]);
                            exit;
                        }
                }elseif(!empty($data['CheckoutRequestID'])) {
                   $CheckoutRequestID = Mpesatra::select('paymentStatus')->where('CheckoutRequestID','=', $data['CheckoutRequestID'])->get();
                       if($CheckoutRequestID[0]['paymentStatus'] == "PAID") {
                            return response()->json([
                                'response_code' => '200',
                                'paymentStatus' => 'PAID',
                            ]);
                            exit;
                        }else{
                            return response()->json([
                                'response_code' => '200',
                                'paymentStatus' => 'FAILED',
                            ]);
                            exit;
                        }
                }else{
                    return response()->json([
                        'response_code' => '401',
                        'paymentStatus' => 'Invalid Request Supplied',
                    ]);
                    exit;
                }
                break;
            default:
                return response([
                    'responce_code' => '200',
                    'message' => 'Invalid Action',
                ]);
                exit;
        }
        
    }

    //update successful paid transaction via mpesa
    private function updateCorporateOrders($CorderId){
        return Corporatemealsweekly::where('orderID', $CorderId)
                            ->update([
                                'paymentStatus' => 'PAID'
                            ]);
    }


    //query transaction status
   // private function stkquery($BusinessShortCode, $password,$timestamp,$CheckoutRequestID){

    //     $queryurl = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
    //     $token = json_decode($this->mpesa_access_token())->access_token;
    //     //return $token;

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_URL,$queryurl);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token));
    //     $curl_post_data = array(
    //         'BusinessShortCode' => $BusinessShortCode,
    //         'Password' => $password,
    //         'Timestamp' => $timestamp,
    //         'CheckoutRequestID' => $CheckoutRequestID
    //     );
    //     $data_string = json_encode($curl_post_data);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($curl, CURLOPT_POST, true);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    //     curl_setopt($curl, CURLOPT_HEADER, false);
    //     $curl_response = curl_exec($curl);

    //     return $curl_response;
    // }




}


