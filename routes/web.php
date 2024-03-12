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

Route::get('createToken', 'App\Http\Controllers\AtmController@createToken');
Route::post('bankTrading/accountOpening', 'App\Http\Controllers\AtmController@accountOpen');
Route::get('bankTrading/{account_id}', 'App\Http\Controllers\AtmController@balanceReference');
//{account_id}がコントローラーのメソッドの引数に渡される。