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
});
Route::get('/usersogl/', function () {
    return view('usersogl');
});


Route::get('/pay/',  'App\Http\Controllers\PayController@store');
Route::get('/payfortest/',  'App\Http\Controllers\PayController@test');


Route::get('/success-pay/',  'App\Http\Controllers\PayController@successPay');

