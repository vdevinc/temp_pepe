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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['middleware' => ['jwt.verify'], 'prefix' => 'v1/'], function() {

    Route::post('logout', 'Api\UserController@logout');

    Route::post('user/file', 'Api\FileController@profile');
    Route::post('user/device', 'Api\UserController@device');

    Route::get('/profile', 'Api\UserController@profile');
    Route::post('pdf/agreement', 'Api\PdfController@agreement');

    Route::put('profile/update', 'Api\UserController@updateProfile');



    /* Payment */
    Route::post('payment/save', 'Api\PaymentController@save');
    Route::get('payment/settings', 'Api\PaymentController@settings');
    Route::get('payment/bank', 'Api\PaymentController@bank');
    Route::post('payment/bank', 'Api\PaymentController@saveBankAccount');




    /*  Dishes */
    Route::post('dish', 'Api\DishController@store');
    Route::get('dish/list', 'Api\DishController@list');
    Route::get('dish/{id}', 'Api\DishController@show');
    Route::put('dish/{id}', 'Api\DishController@update');

    /* Order */
    Route::post('order', 'Api\OrderController@store');
    
    Route::get('client/order/list', 'Api\OrderController@listForClient');
    Route::get('chef/order/list', 'Api\OrderController@listForChef');
    Route::post('order/status', 'Api\OrderController@status');
    Route::post('order/complete', 'Api\OrderController@complete');


    Route::get('chef/wallet', 'Api\WalletController@index');

    /* chef location */
     Route::post('chef-location', 'Api\LocationController@store');
    

});




Route::group(['prefix' => 'v1/'], function() {



    Route::post('chef/register', 'Api\UserController@registerChef');
    Route::post('client/register', 'Api\UserController@registerClient');
    Route::post('login', 'Api\UserController@login');
    Route::post('password/reset', 'Api\UserController@passwordReset');
    Route::post('password/reset-confirm', 'Api\UserController@passwordResetConfirm');

    Route::post('order/price', 'Api\OrderController@price');
    


    Route::get('chefs', 'Api\ChefController@search');
    Route::get('chef/{id}', 'Api\ChefController@show');
    Route::get('dishes', 'Api\DishController@search');
    Route::get('dish/{id}', 'Api\DishController@show');

    Route::get('fcm/test', 'Api\UserController@fcm');


    /** especially for mobile app */
    Route::get('dishes/chef', 'Api\DishController@searchChef');

     /* chef location */
    Route::get('get-location/{id}', 'Api\LocationController@show');

});    


Route::group(['middleware' => ['bootstrap.jwt.verify'], 'prefix' => 'v1/'], function() {

   Route::get('bootstrap', 'Api\UserController@bootstrap');
   Route::post('chef-location', 'Api\LocationController@store');
   Route::get('get-location/{id}', 'Api\LocationController@show');


});    
  