<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Seller\SellerAuthController;
use App\Http\Controllers\Api\v1\User\UserAuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('sellerlogin',[SellerAuthController::class,'seller_login']);
Route::post('sellerregister',[SellerAuthController::class,'seller_register']);

Route::post('userlogin',[UserAuthController::class,'user_login']);
Route::post('userregister',[UserAuthController::class,'user_register']);

//api-customer rolu olanlar //
Route::get('/customer', function () {
    //
})->middleware('auth:api-customers');
//Alttaki Api Rolunden alınıyor //
Route::get('/user', function () {
    //
})->middleware('auth:api');