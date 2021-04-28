<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Corporatesubscriptions;
use App\Models\Corporateusers;
use App\Http\Resources\CorporateResource;

class CorporateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CorporateResource::collection(Corporatesubscriptions::all())->first(); // return colection
    }


    public function getGroup(Request $request){

        $data = $request->all();
        if ($data['action'] == null && $data['iUserId'] == null or $data['action'] == null or $data['iUserId'] == null ) {
            return response([
                'responce_code' => '401',
                'message'       => 'All Fields Required'
            ]);
            exit;
        };

        $action  = $data['action'];
        $iUserId = (int)$data['iUserId'];
        switch ($action) {
            case $action == "CHECK_REGISTRATION":
                if($this->checkCorporateUserExists($iUserId)){
                    return $this->checkCorporateUserExists($iUserId);
                }
                break;
            default:
                return response([
                    'responce_code' => '300',
                    'message'       => 'Invalid Action'
                ]);
                exit;
        }

      
    }

    private function checkCorporateUserExists($iUserId){
        $corpdtata = CorporateResource::collection(Corporatesubscriptions::all())->first();
        $customer = Corporateusers::where('iUserId', $iUserId)->get();
        //return $customer;
        if(count($customer) == 0){
            return response([
                'responce_code'  => '210',
                'message'        => 'User Doesn\'t Exists',
                'data'           => $corpdtata
            ]);
            exit;
         }else{
            return response([
                'responce_code'  => '200',
                'message'        => 'User Already Exists',
                'data'           => $corpdtata,
                'belongs' => [
                    'subscription_group_name'  =>  $customer[0]['subscription_group_name'],
                    'reference_code' =>  $customer[0]['reference_code']
                ]
            ]);
         }
    }


}
