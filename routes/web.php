<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('accountOpening', "App\Http\Controllers\AtmController@accountOpen");
Route::get('create', "App\Http\Controllers\AtmController@createToken");
Route::get('balanceReference/{account_id}', "App\Http\Controllers\AtmController@balanceReference");
Route::post('depositMoney/{account_id}', "App\Http\Controllers\AtmController@deposit");
Route::post('withdrawal/{account_id}', "App\Http\Controllers\AtmController@withdrawal");

Route::get('atm-spa', "App\Http\Controllers\SpaController@index");