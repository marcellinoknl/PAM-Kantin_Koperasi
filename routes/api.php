<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProdukController;
use App\Http\Controllers\barangController;

use App\Http\Controllers\pulsaController;
use App\Http\Controllers\pesananController;
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

Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);
Route::get('makananminuman', [ProdukController::class,'index']);
Route::post('chekout', 'Api\TransaksiController@store');
Route::get('chekout/user/{id}', 'Api\TransaksiController@history');
Route::post('chekout/batal/{id}', 'Api\TransaksiController@batal');
Route::post('push', 'Api\TransaksiController@pushNotif');