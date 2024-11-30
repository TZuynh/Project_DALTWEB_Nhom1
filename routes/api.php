<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\ApiCartController;
use App\Http\Controllers\User\Checkout\VNPayController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::post('/Get-user', [ApiCartController::class, 'login']);

//Phuoc
Route::get('/cart/{id}', [ApiCartController::class, 'getCartByIdCustomer']);
Route::get('/Get-cart/{id}', [ApiCartController::class, 'getCart']);
Route::post('/edit-Cart', [ApiCartController::class, 'editCartItem']);
Route::delete('/delCart/{id}', [ApiCartController::class, 'delCart']);

//Huy
Route::get('/get-voucher', [ApiCartController::class, 'getVoucher']);
Route::post('/payment', [VNPayController::class, 'createPayment']);
Route::post('/payment-success-cash', [VNPayController::class, 'paymentSuccessCash']);
Route::post('/payment-success', [VNPayController::class, 'paymentSuccess']);