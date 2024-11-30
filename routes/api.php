<?php

use App\Http\Controllers\User\Api\ApiContactController;
use App\Http\Controllers\User\Api\ApiFooterController;
use App\Http\Controllers\User\Api\ApiProductController;
use App\Http\Controllers\User\Api\ApiProductDetailController;
use App\Http\Controllers\User\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\User\Api\APILoginController;
use App\Http\Controllers\User\Api\ApiCartController;
use App\Http\Controllers\User\Checkout\VNPayController;


/*
|----------------------------------------------------------------------|
| API Routes                                                           |
|----------------------------------------------------------------------|
| Routes cho các API                                                   |
|----------------------------------------------------------------------|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/footer', [ApiFooterController::class, 'index']);
Route::get('/contacts', [ApiContactController::class, 'index']);
Route::post('/contacts', [ApiContactController::class, 'store']);
Route::get('/products', [APIProductController::class, 'index']);
Route::get('/productdetail', [ApiProductDetailController::class, 'index']);

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
