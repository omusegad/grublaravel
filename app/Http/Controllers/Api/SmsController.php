<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use AfricasTalking\SDK\AfricasTalking;
use App\Phoneverification;
use Faker\Provider\bg_BG\PhoneNumber;

class SmsController extends Controller
{

    public function store(Request $request)
    {
        $phoneRequest = $request->all();
        if ($phoneRequest['action'] == null && $phoneRequest['PhoneNumber'] == null && $phoneRequest['HashString'] == null or $phoneRequest['action'] == null or $phoneRequest['PhoneNumber'] == null or $phoneRequest['HashString'] == null ) {
            return response([
                'responce_code' => '200',
                'message'       => 'All Fields Required'
            ]);
            exit;
        };

        $action      = $phoneRequest['action'];
        $PhoneNumber = $phoneRequest['PhoneNumber'];
        $HashString  = $phoneRequest['HashString'];
        $digits = '';
        $length = 4;
        $randomChar  = $this->randomDigits($length);
        if($action == "SMS_TEXT"){
            $checkRecord = $this->checkIfPhonenumberExists($PhoneNumber);
            if ($checkRecord) {
                $this->updatePhoneRecord($PhoneNumber, $HashString, $randomChar);
                $this->sendSms($PhoneNumber, $randomChar, $HashString);
                return response([
                    'response_code' => '200',
                    'HashString'    => $HashString,
                    'message'       => 'Code Generated Successfully'
                ]);
                exit;
            }
            else{
                $veryData =  $this->saveVerificatioDetails($randomChar, $PhoneNumber, $HashString);
                if ($veryData) {
                    $this->sendSms($PhoneNumber, $randomChar, $HashString);
                    return response([
                        'response_code' => '200',
                        'HashString'    => $HashString,
                        'message'       => 'Code Generated Successfully'
                    ]);
                    exit;
                }
            }



        }else{
            return response([
                'responce_code' => '200',
                'message'       => 'Invalid Action'
            ]);
            exit;
        }
    }

    public function verifyphone(Request $request){

         $phoneRequest = $request->all();
        if ($phoneRequest['action'] == null && $phoneRequest['PhoneNumber'] == null && $phoneRequest['verification_code'] == null or $phoneRequest['action'] == null or $phoneRequest['PhoneNumber'] == null or $phoneRequest['verification_code'] == null) {
            return response([
                'responce_code' => '200',
                'message'       => 'All Fields Required'
            ]);
            exit;
        };

        $PhoneNumber = $phoneRequest['PhoneNumber'];
        if ($phoneRequest['action'] == "VERIFY_PHONE") {
            $data = $this->checkIfPhonenumberExists($PhoneNumber);
            if ($phoneRequest['verification_code'] == $data['verification_code']) {
                return response([
                    'response_code' => '200',
                    'message'       => 'Phone Verified Successfully'
                ]);
                exit;
            }else{
                return response([
                    'response_code' => '200',
                    'message'       => 'Invalid Code'
                ]);
                exit;
            }
        } else {
            return response([
                'responce_code' => '200',
                'message'       => 'Invalid Action'
            ]);
            exit;
        }

    }


    //save verificatioon data
    private function saveVerificatioDetails($randomChar,$PhoneNumber, $HashString){
        $data = Phoneverification::create([
                'PhoneNumber'        => $PhoneNumber,
                'HashString'         => $HashString,
                'verification_code'  => $randomChar,
        ]);
        return $data;
    }

    // Send sms and unique codes
    private function sendSms($PhoneNumber, $randomChar, $HashString){
        $username = env('AFARICASTALKING_USERNAME'); // use 'sandbox' for development in the test environment
        $apiKey   = env('AFARICASTALKING_APIKEY');  // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);
        $sms      = $AT->sms();
        $senderId = env('AFARICASTALKING_SENDERID'); //GRUB';

        // Use the service
        $result   = $sms->send([
            'from'    => $senderId,
            'to'      => $PhoneNumber,
            'message' => '<#>Your Grub secure verification code is '.$randomChar.'. DO NOT share this verification code with anyone. It is your SECRET.'.$HashString
        ]);
        return $result;
    }


    //check if phone number exists
    private function checkIfPhonenumberExists($PhoneNumber){
        $findPhone = Phoneverification::where('PhoneNumber', $PhoneNumber)->first();
        return $findPhone;
    }

    //update records if exists
    private function updatePhoneRecord($PhoneNumber,$HashString,$randomChar){
      $updateRecord = Phoneverification::where('PhoneNumber', $PhoneNumber)
                         ->update([
                            'PhoneNumber'        => $PhoneNumber,
                            'HashString'         => $HashString,
                            'verification_code'  => $randomChar,
                         ]);
       return $updateRecord;
    }


    private function randomDigits($length){
        $numbers = range(0, 9);
        shuffle($numbers);
        for ($i = 0; $i < $length; $i++) {
            global $digits;
            $digits .= $numbers[$i];
        }
        return $digits;
    }


}
