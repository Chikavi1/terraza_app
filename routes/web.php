<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('reservation',function(){
	return view('reservation');
});

Route::get('create_reservation','HomeController@store')->name('create_reservation');
Route::resource('bussiness','BussinessController');
Route::get('search','HomeController@search')->name('search');
Route::get('profile','HomeController@user')->name('profile');

Route::post('addImages','BussinessController@addImages')->name('addImages');

Route::post('storeImage','BussinessController@storeImages')->name('saveImages');

Route::post('checking','BussinessController@checking')->name('checking');
Route::get('pagos','PaymentController@pagos')->name('pagos');



Route::post('pay','PaymentController@pay')->name('pay');
Route::get('/payments/approval','PaymentController@approval')->name('approval');
Route::get('/payments/cancelled','PaymentController@cancelled')->name('cancelled');



Route::get('terminos','HomeController@terminos')->name('terminos');
Route::get('privacidad','HomeController@privacidad')->name('privacidad');
Route::get('ayuda','HomeController@ayuda')->name('ayuda');
