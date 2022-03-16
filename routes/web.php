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



Route::get('/', 'HomeController@index');
Route::get('app/privacy', 'HomeController@privacyapp');
Route::get('app/faq', 'HomeController@faqapp');
Route::get('app/terms', 'HomeController@termsapp');
Route::get('app/faqchef', 'HomeController@faqchefapp');
Route::get('app/faqclient', 'HomeController@faqclientapp');

Route::get('/about', 'HomeController@about');
Route::get('/faq', 'HomeController@faq');
Route::get('/faqchef', 'HomeController@faqchef');
Route::get('/faqclient', 'HomeController@faqclient');
Route::get('/terms', 'HomeController@terms');
Route::get('/privacypolicy', 'HomeController@privacypolicy');
Route::get('/privacy', 'HomeController@privacyapp');
Route::get('/contact', 'ContactUsController@contact');
Route::post('/contactus', 'ContactUsController@sendmail');

Route::get('/login', 'UserController@login');
Route::get('/password/reset', 'UserController@passwordReset');
Route::get('/password/reset-confirm', 'UserController@passwordResetConfirm');


Route::get('chef/register', 'UserController@chef');
Route::get('client/register', 'UserController@client');

Route::get('chef/agreement', 'DashboardController@chefAgreement');
Route::get('chef/agreement-approval', 'DashboardController@chefAgreementApproval');

Route::get('client/payment', 'DashboardController@payment');
Route::get('chef/bank', 'DashboardController@bank');



Route::get('dish/create', 'DishController@create');
Route::get('dish/edit/{id}', 'DishController@create');

Route::get('dish/list', 'DishController@list');
Route::get('profile', 'DashboardController@profile');
Route::get('profile/edit', 'DashboardController@profileEdit');

Route::get('chefs', 'ChefController@search');
Route::get('chef/{id}', 'ChefController@show');

Route::get('dishes', 'DishController@search');
Route::get('dish/{id}', 'DishController@show');

Route::get('client/order/list', 'OrderController@listForClient');
Route::get('chef/order/list', 'OrderController@listForChef');
Route::get('chef/wallet', 'WalletController@chef');


Route::get('client/order/checkout/{dish_id}/{no_of_people}/{service_type}/{time_slot}', 'OrderController@checkout');
Route::get('/client/order/complete/{order_id}', 'OrderController@complete');






Route::get('/admin/login', 'Admin\UserController@login');
Route::get('/admin/logout', 'Admin\UserController@logout');

/* ----------------Admin Routes ------------------ */

// Route::group(['middleware' => ['auth']], function() {


    Route::post('/admin/authenticate', 'Admin\UserController@authenticate');

    Route::get('/admin/home', 'Admin\HomeController@index');
    Route::get('/admin/clients', 'Admin\ClientsController@index');
    Route::get('/admin/clients/{id}', 'Admin\ClientsController@clientsDetails');
    Route::get('/admin/deleteClients/{id}', 'Admin\ClientsController@delete');
    Route::get('/admin/dishes', 'Admin\DishesController@index');
    Route::get('/admin/dishes/{id}', 'Admin\DishesController@dishDetails');
    Route::post('/admin/dish-approve', 'Admin\DishesController@dishApprove');
    Route::post('/admin/dish-reject', 'Admin\DishesController@dishReject');
    Route::get('/admin/dishdelete/{id}', 'Admin\DishesController@delete');

    Route::get('/admin/chefs', 'Admin\ChefsController@index');
    Route::get('/admin/chefs/{id}', 'Admin\ChefsController@chefDetails');
    Route::get('/admin/chefdelete/{id}', 'Admin\ChefsController@delete');
    Route::post('/admin/chefs-approve', 'Admin\ChefsController@chefsApprove');
    Route::post('/admin/chefs-reject', 'Admin\ChefsController@chefsReject');

    Route::get('/admin/payment', 'Admin\PaymentController@index');
    Route::get('/admin/orders', 'Admin\OrdersController@index');
    Route::get('/admin/orders/{id}', 'Admin\OrdersController@orderDetails');
    Route::get('/admin/reviews/{id}', 'Admin\OrdersController@reviewDetails');
    Route::post('/admin/review_status', 'Admin\OrdersController@review_status');
    Route::get('/admin/dashboard', 'Admin\DashboardController@index');




    Route::get('/home', 'HomeController@index')->name('home');


//});    
