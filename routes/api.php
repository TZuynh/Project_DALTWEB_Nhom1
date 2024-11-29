<?php

use App\Http\Controllers\User\Api\ApiContactController;
use App\Http\Controllers\User\Api\ApiFooterController;
use App\Http\Controllers\User\Api\ApiProductController;
use App\Http\Controllers\User\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/footer', [ApiFooterController::class, 'index']);
Route::get('/contacts', [ApiContactController::class, 'index']);
Route::post('/contacts', [ApiContactController::class, 'store']);
Route::get('/products', [ApiProductController::class, 'index']);

