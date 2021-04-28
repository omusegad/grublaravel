<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Loyalty;
use App\Loyaltyrewords;
use App\Orders;
use App\Http\Resources\LoyaltypointsResource as LoyaltyResource;

class LoyaltypointsController extends Controller
{

    public function store(Request $request)
    {
        $pointRequest = $request->all();
        if($pointRequest['action'] == null && $pointRequest['iUserId'] == null && $pointRequest['amount'] == null or $pointRequest['action'] == null or $pointRequest['iUserId'] == null  or $pointRequest['amount'] == null){
            return response([
                'responce_code' => '200',
                'message'       => 'All Fields Required'
            ]);
            exit;
        };

        // initialize captured data
        $amountSpent    = $pointRequest['amount'];   // 50 Shilings == 1 point
        $action         = $pointRequest['action'];
        $pointRequestId = $pointRequest['iUserId'];
        $actionid = '';
        switch ($action) {
            case $action == "SIGNUP":
                $actionid = '1';
                break;
            case $action == "REVIEW":
                $actionid = '2';
                break;
            case $action == "CHECK_ORDER_NO":
                if($this->checkCustomerFirstOrder($pointRequestId) == 0)
                {
                  $actionid = '3';
                }
                elseif($this->checkCustomer20eth_Order($pointRequestId) == 20)
                {
                  $actionid = '4';
                }
                else{
                   return $this->getPointsAmountSpend($pointRequestId, $amountSpent);
                }
                break;
            default:
                return response([
                    'responce_code' => '200',
                    'message'       => 'Invalid Action'
                ]);
                exit;
        }

        //store loyalty points
        if($actionid){
            $points = Loyaltyrewords::select('points_earnings')->where('id', (int)$actionid)->get();
            $pointsEarned = $points[0]['points_earnings'];
            if($pointsEarned){
              return $this->awordLoyaltyPoints($pointsEarned, $pointRequestId, $action);
            }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $customerPoints = Customer::find($id);
       if(!$customerPoints){
            return response([
                'responce_code' => '404',
                'message'       => 'User does not exist'
            ]);
            exit;
       }else{
          $data = new LoyaltyResource($customerPoints);
            return response([
                'responce_code' => '200',
                'data'          =>  $data
            ]);
          exit;
       }
    }

    // awoard loaylty points to db
    private function awordLoyaltyPoints($pointsEarned, $pointRequestId, $action){
        $data = Loyalty::create([
            'iUserId'        =>  $pointRequestId,
            'pointsAmount'   =>  $pointsEarned,
            'redeemStatus'   => 'CREDIT',
        ]);

        if($data) {
            return response([
                'Action'        => $action ,
                'response_code' => '200',
                'message'       => 'Loyalty Points Awarded Successfully'
            ]);
            exit;
        }
    }

    /// check customer first order before awarding points
    private function checkCustomerFirstOrder($pointRequestId){
        $countOrder = Orders::select('iOrderId')
                      ->where('iUserId', $pointRequestId)
                      ->get();
                      return $countOrder->count();
    }

    /// check customer  20eth order befores warding points
    private function checkCustomer20eth_Order($pointRequestId){
        $countOrder = Orders::select('iOrderId', 'iStatusCode')
                      ->where('iUserId', $pointRequestId)
                      ->where('iStatusCode', '6')
                      ->get();
                      return $countOrder->count();
    }

    //calculate points based on customer spendings 
    private function getPointsAmountSpend($pointRequestId, $amountSpent){
        //50 Shilings == 1 point
        $pointsEarned =  floor($amountSpent/50);
        $data = Loyalty::create([
            'iUserId'        =>  $pointRequestId,
            'pointsAmount'   =>  $pointsEarned,
            'redeemStatus'   => 'CREDIT',
        ]);

        if ($data) {
            return response([
                'response_code' => '200',
                'message'       => 'Loyalty Points Awarded Successfully'
            ]);
            exit;
        }
    }






}
