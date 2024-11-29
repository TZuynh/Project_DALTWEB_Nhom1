<?php

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

// Các route không yêu cầu xác thực (ví dụ đăng nhập, đăng ký người dùng)
// Route đăng nhập API
Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('auth:sanctum')->group(function () {
    
    
    // Các route khác chỉ người dùng đăng nhập mới có thể truy cập (ví dụ: đổi mật khẩu, thông tin tài khoản, v.v.)
    //Route::get('/user', [App\Http\Controllers\User\Api\APIUserController::class, 'getUserInfo']);  // Route lấy thông tin người dùng
});
Route::get('/products', [App\Http\Controllers\User\Api\APIProductController::class, 'index']);

Route::get('/productdetail', [App\Http\Controllers\User\Api\APIProductDetailController::class, 'index']);