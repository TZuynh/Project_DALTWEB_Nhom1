<?php

use App\Http\Controllers\User\Api\ApiContactController;
use App\Http\Controllers\User\Api\ApiFooterController;
use App\Http\Controllers\User\Api\ApiProductController;
use App\Http\Controllers\User\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\APILoginController;
/*
|----------------------------------------------------------------------|
| API Routes                                                           |
|----------------------------------------------------------------------|
| Routes cho các API                                                   |
|----------------------------------------------------------------------|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/footer', [ApiFooterController::class, 'index']);
Route::get('/contacts', [ApiContactController::class, 'index']);
Route::post('/contacts', [ApiContactController::class, 'store']);
Route::get('/products', [App\Http\Controllers\User\Api\APIProductController::class, 'index']);
Route::get('/productdetail', [App\Http\Controllers\User\Api\APIProductDetailController::class, 'index']);
