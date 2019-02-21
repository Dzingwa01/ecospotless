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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login_user','ApiLoginController@login');
Route::get('get_pricing','PriceController@getPricesAPI');
Route::get('get_current_requests/{client}','WashRequestController@getWashRequests');
Route::post('submit-wash-request','WashRequestController@store');
