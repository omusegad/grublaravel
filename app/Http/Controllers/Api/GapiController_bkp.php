<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Hash;
use App\Deliveryservice;
use App\User;
use App\Store;
use App\Userwallet;
use App\Payment;
use App\Mpesatra;
use App\Http\Requests\grupayRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GapiController extends Controller
{
    public function __construct()
    {

    }
    //user register
    public function register(Request $request){
        $validatedData =  $request->validate([
             'name'  => 'required|max:55',
             'email' =>  'email|required|unique:users',
             'password' =>  'required|confirmed'
         ]);

         $validatedData['password']= Hash::make($validatedData['password']);


         $user = User::create($validatedData);
         $useraccessToken = $user->createToken('authToken')->accessToken;
         return response(['user' => $user, 'useraccess_token' => $accessToken ]);

     }

     //user login
     public function login(Request $request){
         $loginData =  $request->validate([
              'email' =>  'email|required',
              'password' =>  'required'
          ]);
          if(!auth()->attempt($loginData)){
             return response(['message' => 'Invalid Credetials']);
          }

          $accessToken = auth()->user()->createToken('authToken')->accessToken;
          return response(['user' =>auth()->user(), 'access_token' => $accessToken ]);
    }


   //aget all sevices offered by grub
   public function services(Request $request){
     //$services = Deliveryservice::with('store')->get();
     $services = Deliveryservice::all();
     return response(['service' => $services]);


   }


    //signup restaurant
    public function restaurant(Request $request){

        $rules = [
            'Action'    => 'required',
            'iServiceId' => 'required'
        ];


        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return $validator->errors();
        }


        $serviceid = $request->input('iServiceId'); // api post params
        $store = Store::where('iServiceId', $serviceid)->get(); // get data per cat Ids

        $response = [
            "response_code"=>'200',
            'store' =>  $store
        ];

        return response()->json($response);
    }

    //customer register api
    public function cregister(Request $request){
        $validatedData =  $request->validate([
             'name'  => 'required|max:55',
             'email' =>  'email|required|unique:users',
             'password' =>  'required|confirmed'
         ]);

         $validatedData['password']= Hash::make($validatedData['password']);


         $user = User::create($validatedData);
         $accessToken = $user->createToken('authToken')->accessToken;
         return response(['user' => $user, 'access_token' => $accessToken ]);

     }

    //customer login
     public function clogin(Request $request){
         $loginData =  $request->validate([
              'email' =>  'email|required',
              'password' =>  'required'
          ]);
          if(!auth()->attempt($loginData)){
             return response(['message' => 'Invalid Credetials']);
          }

          $accessToken = auth()->user()->createToken('authToken')->accessToken;
          return response(['user' =>auth()->user(), 'access_token' => $accessToken ]);
      }


    //Perform stk push to safcom
    public function grubpay(grupayRequest $request)
    {
            $payData = $request->validated();
            //return  $payData;

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
            //return  $curl_response;
            $decodere = json_decode($curl_response);
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
                    'CheckoutRequestID'   => $decodere->CheckoutRequestID,
                    'ResponseDescription' => $decodere->ResponseDescription,
                ];

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
                return response([
                    'responce_code' => '200',
                    'CheckoutRequestID' => $data['CheckoutRequestID'],
                    'success' => 'STK Push Successfully'
                ]);

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
        $transaction = new Mpesatra();
        $transaction->MerchantRequestID	  = $data['MerchantRequestID'];
        $transaction->phoneNumber         = $data['phoneNumber'];
        $transaction->iUserId             = $data['iUserId'];
        $transaction->iCompanyId          = $data['iCompanyId'];
        $transaction->iOrderId            = $data['iOrderId'];
        $transaction->GeneralUserType     = $data['GeneralUserType'];
        $transaction->GeneralDeviceType   = $data['GeneralDeviceType'];
        $transaction->CheckoutRequestID	  = $data['CheckoutRequestID'];
        $transaction->vPaymentMethod	  = $data['vPaymentMethod'];
        $transaction->ResponseDescription = $data['ResponseDescription'];
        return $transaction->save();
    }

    //check mpesa payment if successful
    public function checkMtransaction(Request $request){
        $data =  $request->validate([
            'action'      => 'required',
            'iOrderId'    => 'required',
            'phoneNumber' => 'required'
        ]);

        $orderId = Mpesatra::where('iOrderId', $data['iOrderId'])->first();
       // return $orderId;
        if($orderId['paymentStatus'] == "FAILED"){
            return response()->json([
                'response_code' => '200',
                'paymentStatus' => 'FAILED'
                ]);
        }
        return response()->json([
            'response_code' => '200',
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


