<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


//public mpesa webhooks
Route::post('/webhook', 'PaymentController@webhook');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //only logged in users allowed below
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    //only logged inn user allowed above

    Route::get('/', 'HomeController@index');

    Route::resource('users', 'UsersController');
    Route::resource('store', 'StoreController');
    Route::resource('customers', 'CustomersController');
    Route::resource('itemcategories', 'StoreCategoryController');
    Route::resource('itemtype', 'ItemtypeController');
    Route::resource('items', 'ItemsController');
    Route::resource('drivers', 'DriversController');
    Route::resource('vehicles', 'VehiclesController');
    Route::resource('delivery_services', 'DeliveryServiceController');
    Route::resource('orders', 'OrdersController');
    Route::resource('loyalty_rewords', 'LoyaltyrewordsController');
    Route::resource('corporate_subscriptions', 'CorporatesubscriptionsController');

    Route::prefix('dashboard')->group(function () {
        Route::get('/sms-groups', 'BulksendController@index');
        Route::post('/send-text', 'BulksendController@sendMessage');
        Route::get('/single-sms', 'BulksendController@singleUser');


    });

    //cooporate groups
    Route::prefix('corporate_subscription')->group(function () {
        Route::resource('groups', 'CorporatesubscriptiongroupsController');
        Route::post('temp/users', 'CorporatesubscriptiongroupsController@importusers');
        Route::resource('meals', 'CorporatesubscriptionsmealsController');
        Route::resource('subscribers', 'CorporatesubscriptionusersController');
        Route::resource('grubsubsorders', 'CorporateordersController');
        Route::resource('payments', 'CorporatepaymentController');

    });


    //Mpesa transactions
     Route::prefix('mpesa')->group(function () {
        Route::resource('payments', 'MpesaPaymentsController');
    });


    ///livewire routes
    //Route::view('allstores','store.index');


});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
