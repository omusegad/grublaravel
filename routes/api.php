<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//main admin user login routes
Route::prefix('user')->group(function () {
   Route::post('/register', 'Api\AuthController@register' );
   Route::post('/login', 'Api\AuthController@login' );
});

//main Customer login and signup routes
Route::prefix('customer')->group(function () {
    Route::post('/signup', 'Api\CustomerController@signup');
    Route::post('/signin', 'Api\CustomerController@signin');
});

//add money to wallet routes
Route::prefix('wallet')->group(function () {
    Route::post('/addmoney', 'Api\AddmoneyController@addmoney');
});

//add money to wallet routes
Route::prefix('sms')->group(function () {
    Route::post('/text', 'Api\SmsController@index');
});

//add money to loyalty Points routes
Route::prefix('loyalty')->group(function () {
    Route::apiResource('userpoints', 'Api\LoyaltypointsController')->except(['index','update','destroy']);
});

//send sms request
Route::prefix('sms')->group(function () {
    Route::apiResource('text', 'Api\SmsController')->except(['update', 'index', 'destroy']);
    Route::post('/veryphone', 'Api\SmsController@verifyphone');
});


//corporate api
Route::prefix('corporate')->group(function () {
    Route::apiResource('data', 'Api\CorporateController');
    Route::apiResource('groups', 'Api\CorporategroupsController');
    Route::post('group', 'Api\CorporateController@getGroup');
    Route::post('group/orders', 'Api\CorporategroupsController@getOrder');
    Route::post('group/deliveryfee', 'Api\CorporategroupsController@groupDeliveryFee');
    Route::post('group/user/orders_history', 'Api\CorporategroupsController@userOrderHistory');

});

Route::get('/grest/services', 'Api\GapiController@services' );
Route::post('/grest/services/restaurant', 'Api\GapiController@restaurant' );

///payments api
Route::post('/grest/pay', 'Api\GapiController@grubpay' );
Route::post('/grest/paystatus', 'Api\GapiController@checkMtransaction');








/// API VERSION (1) CONTROLL EARLIE APIS
Route::prefix('v2')->group(function () {
    //main admin user login routes
    Route::prefix('user')->group(function () {
        Route::post('/signup', 'Api2\CustomerAuthController@signup');
        Route::post('/signin', 'Api2\CustomerAuthController@signin' );
    });

    Route::prefix('loyalty')->group(function () {
       Route::apiResource('userpoints', 'Api2\LoyaltypointsController')->except(['index','update','destroy']);
    });

    Route::prefix('all')->group(function () {
       Route::post('restaurants', 'Api2\getAllRestaurantsController@index');
    });

    //grub sub section apis -- i.e --- url --sample -- http://localhost/grublaravel/api/v2/grubsub/groups
    // Route::prefix('grubsub')->group(function () {
    //     Route::apiResource('groups', 'Api2\GrubsubgroupsController');
    // });

    //Route::apiResource('payments', 'Api2\CapturePaymentsController'); //Capture Payments


});





