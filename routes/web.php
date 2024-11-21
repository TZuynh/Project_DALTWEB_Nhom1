<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});


Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/add', [ProductController::class, 'themmoi'])->name('product.add');
    Route::get('/detail/{id}', [ProductController::class, 'chiTiet'])
    ->name('product.detail');
    Route::post('/start-add', [ProductController::class, 'xuLyThemMoi'])->name('product.start-add');
    Route::get('/update/{id}', [ProductController::class, 'capNhat'])->name('product.update');
    Route::post('/start-update/{id}', [ProductController::class, 'xuLyCapNhat'])->name('product.start-update');
    Route::get('/search', [ProductController::class, 'timKiem'])
    ->name('product.search');
     Route::delete('/delete/{id}', [ProductController::class, 'xuLyXoa'])
     ->name('product.delete');

   
});
