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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/terms', 'terms');
Route::view('/help', 'help.index');
Route::view('/getstarted', 'getstarted');

Route::post('/integrations/patreon', 'PatreonController@handleWebhook');
