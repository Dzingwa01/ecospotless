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
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
/**
 * Users Controller
 */
Route::resource('users','UsersController');
Route::resource('prices','PriceController');

Route::get('get-users','UsersController@getUsers')->name('get-users');
Route::get('/user/delete/{user}','UsersController@destroy');
Route::get('account-activation/{user}','RegisterController@verifyEmail');
Route::get('user-profile','UsersController@getUserProfile');