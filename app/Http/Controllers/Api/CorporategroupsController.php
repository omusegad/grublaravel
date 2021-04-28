<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Corporatesubscriptiongroups;
use App\Http\Resources\CorporategroupResource;
use App\Models\Corporateusers;
use App\Models\Corporatemealsweekly;
use Carbon\Carbon;
use App\Http\Controllers\Controller;


class CorporategroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return CorporategroupResource::collection(Corporatesubscriptiongroups::all());

    }

    public function store(Request $request){
      $getData = $request->all();
        if($getData['action'] == null){
            return response([
                'responce_code' => '201',
                'message'       => 'Field Required'
            ]);
            exit;
        };

        $action = $getData['action'];
        $userId = $getData['iUserId'];
        switch($action) {
            case $action === 'ADD_GROUP':
                $groupData = $this->addGroup($getData);
                if ($groupData) {
                    $this->registerCorporateUser($groupData, $userId);
                    return response([
                        'responce_code' => '200',
                        'message' => 'Group Created successfully',
                        'data' => [
                            'reference_code' => $groupData['reference_code'],
                            'group_name'     => $groupData['subscription_group_name']
                        ]
                    ]);
                }
                break;
            case $action === 'JOIN_GROUP':
                $checkCode = Corporateusers::where('reference_code', $getData['reference_code'])->get();
                $group = Corporatesubscriptiongroups::select('subscription_group_name')->where('reference_code', $getData['reference_code'])->get();
                if(count($group) == 0){
                      return response([
                        'responce_code' => '210',
                        'message' => 'Reference code do not match'
                    ]);
                }else{
                    $groupName = $group[0]['subscription_group_name'];
                }
                if(count($checkCode) == 0){
                      return response([
                        'responce_code' => '210',
                        'message' => 'Reference code do not match'
                    ]);
                 }else{
                    $join = $this->joinGroup($getData, $groupName);
                    if ($join) {
                        return response([
                           'responce_code' => '200',
                           'message' => 'Group Joined successfully',
                            'data' => [
                                'reference_code' => $join['reference_code'],
                                'group_name'     => $join['subscription_group_name']
                            ]
                        ]);
                    }
                 }
                break;
            default:
                return response(['responce_code' => '401', 'message' => 'Forbiden Action']);
                exit;
        }

    }



    private function addGroup($getData) {
        $data = Corporatesubscriptiongroups::updateOrCreate([
            'corporate_subscriptions_id' => $getData['corporate_subscriptions_id'],
            'subscription_group_name'    => $getData['subscription_group_name'],
            'contact_person'             => $getData['contact_person'],
            'reference_code'             => strtoupper($this->generateReferenceCode(5)),
            'phoneNumber'                => $getData['phoneNumber'],
            'location'                   => $getData['location'],
        ]);
        return $data;
    }

    private function joinGroup($getData, $groupName){
        $data = Corporateusers::updateOrCreate([
            'iUserId'        =>  $getData['iUserId'],
            'reference_code' =>  $getData['reference_code'],
            'subscription_group_name'   => $groupName,
        ]);
        return $data;
    }

    // register user to corporate user during register group
    private function registerCorporateUser($groupData, $userId){
        $data = Corporateusers::updateOrCreate([
            'iUserId'        =>   $userId,
            'reference_code' =>  $groupData['reference_code'],
            'subscription_group_name'   => $groupData['subscription_group_name'],
        ]);
        return $data;
    }

     private function generateReferenceCode($length_of_string){
        return substr(bin2hex(random_bytes($length_of_string)), 0, $length_of_string);
    }

    // TO BE CONTINUED TOMMORROW
    public function getOrder(Request $request){
        $data = $request->all();
        $orderDetails = $data['OrderDetails'];
        //return  $orderDetails;
        //return count($orderDetails);
        if($data['action'] == null) {
            return response([
                'responce_code' => '401',
                'message'       => 'Action required'
            ]);
            exit;
        };

        $action = $data['action'];
       // return  $data['groupCode'];
        switch ($action) {
            case $action === "GET_USER_ORDER":
                 $meals = [];
                 $initials = 'CP';
                 $generateOrderId = $initials.mt_rand();
                  foreach($orderDetails as $key => $kyc){
                       //echo $kyc['deliveryFee'];
                    $meals = [
                        'deliveryFee'  => $kyc['deliveryFee'],
                        'deliverydate' => $kyc['date'],
                        'meal_id'      => $kyc['id'],
                        'orderID'      => $generateOrderId,
                        'price'        => $kyc['price'],
                        'quantity'     => $kyc['qty'],
                        'ePaymentOption' => $data['ePaymentOption'],
                        'groupCode'      => $data['groupCode'],
                        'iUserId'        => $data['iUserId'],
                        'payTime'        => $data['payTime']
                      ];
                      //return $meals;
                      $record = $this->createOrderId($meals);
                     // return $record;
                  }
                  if($record) {
                    return response([
                        'responce_code'  => '200',
                        'orderID'        => $record['orderID'],
                        'message'        => 'Order placed successfully'
                    ]);
                    exit;
                    }else{
                        return response([
                            'responce_code' => '210',
                            'message'       => 'Failed order unsuccessful'
                        ]);
                        exit;
                    }
                break;
            default:
                return response([
                    'responce_code' => '200',
                    'message'       => 'Invalid Action'
                ]);
                exit;
        }
    }

    //TO BE CONTINUED TOMMORROW
    public function groupDeliveryFee(Request $request)
    {
        $data   = $request->all();
        if($data['action'] == null && $data['start_date'] == null && $data['group_code'] == null or  $data['action'] == null or  $data['start_date'] == null or  $data['group_code'] == null){
            return response([
                'responce_code' => '201',
                'message'       => 'Field Required'
            ]);
            exit;
        }

        $action = $data['action'];
        switch ($action) {
            case $action === "GET_DELIVERY_FEE":
                $createdAt = Carbon::parse($data['start_date'])->format('Y-m-d');
                if ($this->calculateDeliveryFee($createdAt, $data )) {
                    return $this->calculateDeliveryFee($createdAt, $data);
                }
                break;
            default:
                return response([
                    'responce_code' => '200',
                    'message'       => 'Invalid Action'
                ]);
                exit;
        }

    }

    private function calculateDeliveryFee($createdAt, $data){
       $result = DB::table('corporate_weekly_user_meals')
                 ->where('group_reference_code', $data['group_code'])
                 ->where('deliveryDate', $createdAt)
                 ->get()->sum('quantity');

        $deliveryFeeValue = 50; //each memebr to incure this charge if less than 8 orders
        if($result<8){
            return response([
                'data' => [
                    'total_orders'  => $result,
                    'delivery_fee'  => $deliveryFeeValue ,
                    'start_date'    => $createdAt,
                ],
                'responce_code' => '200',
                'message' => 'Result Successful'
            ]);
            exit;
        }else{
              return response([
                'data' => [
                    'total_orders'  => $result,
                    'delivery_fee'  => '0',
                    'start_date'    => $createdAt
                ],
                'responce_code' => '200',
                'message' => 'Result Successful'
            ]);
            exit;
        }
    }

    private function createOrderId($meals){
        $totapay = ($meals['price'] * $meals['quantity']) + $meals['deliveryFee'];
        return Corporatemealsweekly::create([
            'iUserId' => $meals['iUserId'],
            'group_reference_code' => $meals['groupCode'],
            'corporate_subscriptions_meals_id' =>  $meals['meal_id'],
            'orderID'     => $meals['orderID'],
            'price'       => $meals['price'],
            'quantity'    => $meals['quantity'],
            'deliveryFee' => $meals['deliveryFee'],
            'totalPay'       => $totapay,
            'ePaymentOption' => $meals['ePaymentOption'],
            'deliveryDate'   => $meals['deliverydate'],
            'payTime'        => $meals['payTime'],
        ]);
    }

    public function userOrderHistory(Request $request){
        $data   = $request->all();
        if($data['action'] == null && $data['iUserId'] == null or  $data['action'] == null or  $data['iUserId'] == null){
            return response([
                'responce_code' => '201',
                'message'       => 'Field Required'
            ]);
            exit;
        };
        $action = $data['action'];
        switch ($action) {
            case $action == "GET_ORDER_HISTORY":
                $orders = $this->getOderHistory($data);
                if($orders ) {
                   return response([
                    'data' => [
                      'history'  => $orders ,
                    ],
                    'responce_code' => '200',
                    'message' => 'Result Successful'
                    ]);
                    exit;
                }
                break;
            default:
                return response([
                    'responce_code' => '200',
                    'message'       => 'Invalid Action'
                ]);
                exit;
        }
    }

    private function getOderHistory($data){
        $history = Corporatemealsweekly::where('iUserId', $data['iUserId'])->get();
        return $history;
    }


}
