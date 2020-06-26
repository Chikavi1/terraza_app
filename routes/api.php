<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/v1/getBussinesses','Apicontroller@index');
Route::get('/v1/getBussiness/{id}','Apicontroller@show');
Route::get('/v1/validateReserve','Apicontroller@checkDay');
Route::get('/v1/search','Apicontroller@search');
Route::get('/v1/getReserves/{id}','Apicontroller@getReserves');
Route::get('/v1/createReservation','Apicontroller@createReservation');

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});