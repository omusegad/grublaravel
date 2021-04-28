<?php

namespace App\Http\Controllers\Api2;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    //Customer singup with three actions
    public function signup(Request $request) {
        $action = $request->input('action');
        $vEmail = $request->input('vEmail');
        switch ($action) {
            case $action === "":
                return response([
                    'responce_code' => '400',
                    'message'       => 'Action not Allowed!'
                ]);
                break;
            case $action === "NORMAL_REGISTRATION":
                // Vallidate and save data
                $data = request()->validate([
                    'action'       => 'required|string',
                    'vFirstName'   => 'required|string',
                    'vLastName'    => 'required|string',
                    'vPhone'       => 'required|string',
                    'vEmail'       => 'required|string||unique:register_user,vEmail',
                    'vPassword'    => 'required',
                    'UserType'     => 'required|string',
                    'vInviteCode'  => 'sometimes|nullable',
                ]);
                // Create Customer
                $create = Customer::create([
                    'vName'        => $data['vFirstName'],
                    'vLastName'    => $data['vLastName'],
                    'vPhone'       => $data['vPhone'],
                    'vEmail'       => $data['vEmail'],
                    'vPassword'    => $this->encryptPassword($data['vPassword']),
                    'vCountry'     => 'KE',
                    'vInviteCode'  => $data['vInviteCode'],
                    'eRefType'     => $data['UserType'] === "passanger" ? 'Rider' : 'Driver',
                    'eStatus'      => 'Active',
                    'eDeviceType'  => 'Android',
                    ]);
                if($create){
                    return response([
                        'responce_code' => '201',
                        'message'       => 'Registration Successful'
                    ]);
                    exit;
                }else{
                    return response([
                        'responce_code' => '400',
                        'message'       => 'Record proccessing Failed!'
                    ]);
                    exit;
                }

                break;
            case $action === "SOCIAL_REGISTRATION":
                  // Vallidate and save data
                $data = request()->validate([
                    'action'       => 'required|string',
                    'vFirstName'   => 'required|string',
                    'vLastName'    => 'required|string',
                    'vPhone'       => 'required|string',
                    'vEmail'       => 'required|string||unique:register_user,vEmail',
                    'vPassword'    => 'required',
                    'iGcmRegId'    => 'required',
                    'vFirebaseDeviceToken' => 'required',
                    'UserType'     => 'required|string',
                    'eSignUpType'  => 'required',
                    'vInviteCode'  => 'sometimes|nullable',
                ]);
                return $data;

                // $create = Customer::create([
                //     'vName'        => $data['vFirstName'],
                //     'vLastName'    => $data['vLastName'],
                //     'vPhone'       => $data['vPhone'],
                //     'vEmail'       => $data['vEmail'],
                //     'vPassword'    => $this->encryptPassword($data['vPassword']),
                //     'vCountry'     => 'KE',
                //     'vInviteCode'  => $data['vInviteCode'],
                //     'eRefType'     => $data['UserType'] === "passanger" ? 'Rider' : 'Driver',
                //     'eStatus'      => 'Active',
                //     'eDeviceType'  => 'Android',
                // ]);

                break;
            default:
                return response([
                    'responce_code' => '403',
                    'message'       => 'Forbiden Action'
                ]);
                exit;
        }

    }


    private function encryptPassword($password){
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    //Generate Session Id
    //    $random = substr(md5(rand()), 0, 7);
    //     $Data_passenger['tDeviceSessionId'] = session_id() . time() . $random;
    //     $Data_passenger['tSessionId'] = session_id() . time();

  /// // ganerate reffer code
    // public function ganarateReferenceCode($ereftype) {
    //     global $obj;

    //     $str = "";
    //     //$milliseconds = round(microtime(true) * 1000);
    //     $milliseconds = time();
    //     $shareCode = $this->randomAlphaNum(5);
    //     $timeDigitsStr = strval($milliseconds);
    //     $shareCode = $shareCode . substr($timeDigitsStr, strlen($timeDigitsStr) - 4, strlen($timeDigitsStr) - 1);

    //     if ($ereftype == "Rider") {
    //         $newstring = $shareCode;
    //         $str .= 'pr' . $newstring;
    //     } else if ($ereftype == "Driver") {
    //         $newstring = $shareCode;
    //         $str .= 'dr' . $newstring;
    //     }

    //     $sql_chk_user = "SELECT ru.vRefCode as pRefCode FROM register_user as ru WHERE ru.vRefCode = '" . $str . "'";
    //     $sql_chk_driver = "SELECT rd.vRefCode as dRefCode FROM register_driver as rd WHERE rd.vRefCode = '" . $str . "'";

    //     $result_chk_user = $obj->MySQLSelect($sql_chk_user);
    //     $result_chk_driver = $obj->MySQLSelect($sql_chk_driver);

    //     if ((count($result_chk_user) > 0 && !empty($result_chk_user)) || (count($result_chk_driver) > 0 && !empty($result_chk_driver))) {
    //         $str = $this->ganaraterefercode($ereftype);
    //     }

    //     return $str;
    // }



     //user login
     public function signin(Request $request){
         //actins NORMAL_LOGIN or SOCIAL_LOGIN
        $action = $request->input('action');
           switch ($action) {
            case $action === "":
                return response([
                    'responce_code' => '400',
                    'message'       => 'Action not Allowed!'
                ]);
                break;
            case $action === "NORMAL_LOGIN":
                return 'normal';
                break;
            case $action === "SOCIAL_LOGIN":
               return 'social';
                break;
            default:
                return response([
                    'responce_code' => '403',
                    'message'       => 'Forbiden Action'
                ]);
                exit;

        }

        $data = request()->validate([
            'action'       => 'required|string',
            'vFirstName'   => 'required|string',
            'vLastName'    => 'required|string',
            'vPhone'       => 'required|string',
            'vEmail'       => 'required|string||unique:register_user,vEmail',
            'vPassword'    => 'required',
            'UserType'     => 'required|string',
            'vInviteCode'  => 'sometimes|nullable',
        ]);
    }

}

