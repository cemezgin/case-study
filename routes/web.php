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
//

$version1 = 'v1';

Route::resource("/$version1/hotels", 'HotelController');
Route::resource("/$version1/locations", 'HotelController');
Route::get("/$version1/hotels/{id}/check-bookings", 'HotelController@check');
