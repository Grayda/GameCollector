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

Route::name('subscription:')->prefix('subscription')->middleware('auth')->group(function() {
  Route::get('/update', 'SubscriptionController@showUpdateView');
  Route::post('/update', 'SubscriptionController@update');

  Route::view('/invoices', 'subscription.invoices');
  Route::get('/invoices/download/{invoice}', 'SubscriptionController@downloadInvoice');

  Route::get('/subscribe', 'SubscriptionController@showSubscribeView');
  Route::post('/subscribe', 'SubscriptionController@subscribe');
  
  Route::view('/cancel', 'subscription.cancel');
  Route::post('/cancel', 'SubscriptionController@cancel');
});
