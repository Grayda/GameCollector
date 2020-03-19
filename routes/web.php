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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/share/collection/{id}', 'CollectionController@view');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/terms', 'terms');
Route::view('/help', 'help.index');
Route::view('/getstarted', 'getstarted');
Route::view('/pricing', 'pricing');

Route::name('subscription:')->prefix('subscription')->middleware('auth')->group(function() {
  Route::get('/updatepayment', 'SubscriptionController@showUpdatePaymentView');
  Route::post('/updatepayment', 'SubscriptionController@updatePayment');

  Route::view('/updateplan', 'subscription.updateplan')->middleware('subscribed');
  Route::post('/updateplan', 'SubscriptionController@updatePlan')->middleware('subscribed');

  Route::view('/invoices', 'subscription.invoices');
  Route::get('/invoices/download/{invoice}', 'SubscriptionController@downloadInvoice');

  Route::get('/subscribe', 'SubscriptionController@showSubscribeView');
  Route::post('/subscribe', 'SubscriptionController@subscribe');

  Route::view('/cancel', 'subscription.cancel')->middleware('subscribed');
  Route::post('/cancel', 'SubscriptionController@cancel')->middleware('subscribed');

  Route::view('/resume', 'subscription.resume')->middleware('ongraceperiod');
  Route::post('/resume', 'SubscriptionController@resume')->middleware('ongraceperiod');
});
