<?php

namespace App\Http\Controllers\api2;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class getAllRestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //action => GET_All_RESTAURANTS
        $action = $request->input('action');
        switch ($action) {
            case $action === "":
                return response()->json([
                    'responce_code' => '400',
                    'message'       => 'Action not Allowed!'
                ]);
                break;
            case $action === "GET_All_RESTAURANTS":
                 // Vallidate and save data
                $data = request()->validate([
                    'action'               => 'required|string',
                    'iUserId'              => 'required|int',
                    'PassengerLat'         => 'required|string',
                    'PassengerLon'         => 'required|string',
                    'iServiceId'           => 'required|numeric',
                    'fOfferType'           => 'sometimes|nullable',
                    'cuisineId'            => 'sometimes|nullable',
                    'vUserDeviceCountry'   => 'sometimes|nullable',
                    'vAddress'             => 'sometimes|nullable',
                    'sortby'               => 'sometimes|nullable',
                    'searchword'           => 'sometimes|nullable'
                ]);

                $latitude   = $data['PassengerLat'];
                $longitude  = $data['PassengerLon'];
                $iServiceId = $data['iServiceId'];

                $stores = $this->getNearestResturant($latitude, $longitude, $iServiceId);
                if (sizeof($stores) == 0) {
                    return response()->json([
                        'stores' => 0,
                        'responce_code' => '200',
                        'message'       => 'No available store in your area'
                    ]);
                } else {
                    return response()->json([
                        'stores'        => $stores,
                        'responce_code' => '200',
                        'message'       => 'OK'
                   ]);

                }
                break;
            default:
                return response([
                    'responce_code' => '405',
                    'message'       => 'Forbiden Action'
                ]);
                exit;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    //get nearest restaurant
    private function getNearestResturant($latitude, $longitude, $iServiceId, $radius = 30){

        $store = Store::selectRaw("iCompanyId, vCompany,iServiceId, vRestuarantLocation, vRestuarantLocationLat, vRestuarantLocationLong,tRegistrationDate,tLastOnline,fPackingCharge,fMinOrderValue,fOfferType,
                     ( 6371 * acos( cos( radians(?) ) *
                       cos( radians( vRestuarantLocationLat ) )
                       * cos( radians( vRestuarantLocationLong ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( vRestuarantLocationLat ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
        ->where('eStatus',"=",'Active')
        ->where('iServiceId',"=", $iServiceId)
        ->having("distance", "<", $radius)
        ->orderBy("distance",'asc')
        ->get();

        return $store;

    }










}
