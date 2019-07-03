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
Route::resource('/main-transport', 'MainTransportController');
Route::resource('/main-drivers', 'MainDriversController');
Auth::routes();

Route::get('/drivers-page', 'DriversController@home');
Route::get('/transport-page', 'TransportController@home');
Route::get('/auth', 'AuthController@getAuth');
Route::get('/home', function(){
    return view('home');
});
// Route::resource('/user', 'UserCrutchController');
Route::resource('/drivers', 'DriversController');
Route::resource('/transport', 'TransportController');