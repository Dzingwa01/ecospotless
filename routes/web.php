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
    $prices = \App\Price::with('vehicle')->get();
    return view('welcome',compact('prices'));
});
Route::get('mobile-register',function(){
   return view('mobile-registration');
});


Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
/**
 * Requests Controller
 */



/**
 * Users Controller
 */
Route::resource('users','UsersController');
Route::resource('prices','PriceController');
Route::get('get-prices','PriceController@getPrices')->name('get-prices');
Route::get('/prices/delete/{price}','PriceController@destroy');

Route::resource('vehicle-types','VehicleTypeController');
Route::get('get-vehicles','VehicleTypeController@getVehicles')->name('get-vehicles');
Route::get('/vehicles/delete/{vehicle_type}','VehicleTypeController@destroy');

Route::get('get-users','UsersController@getUsers')->name('get-users');
Route::get('/user/delete/{user}','UsersController@destroy');
Route::get('account-activation/{user}','RegisterController@verifyEmail');
Route::get('user-profile','UsersController@getUserProfile');