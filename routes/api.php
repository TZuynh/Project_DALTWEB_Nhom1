<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Api\APICartController; 
use App\Http\Controllers\User\Api\APIUserController; 
use App\Http\Controllers\User\Api\APICategoryController;
use App\Http\Controllers\User\Api\APIRelatedProductController;
use App\Http\Controllers\User\Api\APIProductController; 




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

Route::get('/cart/{id}', [APICartController::class, 'getCartByIdCustomer']);
Route::get('/Get-cart/{id}',[APICartController::class,'getCart']);
Route::post('/edit-Cart',[APICartController::class,'editCartItem']);
Route::post('/delCart/{id}',[APICartController::class,'delCart']);
Route::post('cart/add',[APICartController::class,'addCart']);
Route::post('/cart/deleteAll',[APICartController::class,'destroyAll']);


//api sản phẩm liên quan
Route::get('related-products/{productId}', [APIRelatedProductController::class, 'getRelatedProducts']);



Route::middleware('throttle:100,1')->post('/your-route', function () {
    return response()->json(['message' => 'OK']);
});




// 
Route::get('/User',[APIUserController::class,'getUser']);
Route::post('/Get-user',[APIUserController::class,'Login']);

// Route::get('/san-pham-theo-loai/{id}',[APICategoryController::class,'sanPhamTheoLoai']);
// Route::get('/loai-san-pham',[APICategoryController::class,'dsLoaiSanPham']);



Route::get('san-pham', [APIProductController::class, 'getAllProducts']); // Lấy tất cả sản phẩm
Route::get('/san-pham-theo-loai/{id}', [APIProductController::class, 'sanPhamTheoLoai']); // Lấy sản phẩm theo loại
Route::get('/loai-san-pham', [APIProductController::class, 'dsLoaiSanPham']); // Lấy chi tiết sản phẩm
