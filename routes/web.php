<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
<<<<<<< Updated upstream
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
=======
use App\Http\Controllers\Admin\OrderManagement\OrderManagementController;
use App\Http\Controllers\Admin\CommentManagement\CommentManagementController;
>>>>>>> Stashed changes

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
    return redirect('/admin/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
<<<<<<< Updated upstream
    Route::get('/dashboard/edit', [DashboardController::class, 'edit'])->name('admin.dashboard.edit');
    Route::put('/dashboard/update', [DashboardController::class, 'update'])->name('admin.dashboard.update');
=======

    //Huy
    Route::get('/order-management', [OrderManagementController::class, 'index'])->name('admin.ordermanagement');
    Route::get('/order-detail/{id}', [OrderManagementController::class, 'show'])->name('admin.show.orderDetail');
    Route::post('/orders/{orderId}/update-status', [OrderManagementController::class, 'updateOrderStatus']);
    Route::get('/comment-management', [CommentManagementController::class, 'index'])->name('admin.commentmanagement');
    Route::post('comments/approve/{commentId}', [CommentManagementController::class, 'approve'])->name('admin.comment.approve');
    Route::post('comments/update/{commentId}', [CommentManagementController::class, 'update'])->name('admin.comment.update');
    // Route::post('comments/delete/{commentId}', [CommentManagementController::class, 'delete'])->name('admin.comment.delete');

>>>>>>> Stashed changes
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
<<<<<<< Updated upstream
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



        Route::get('/add-detail/{product}', [ProductDetailController::class, 'create'])->name('detail.create');
     Route::post('start-add-detail/{product}', [ProductDetailController::class, 'store'])->name('product-detail.store');



   
});
Route::prefix('ProductDetail')->group(function () {
   
    Route::get('add-detail/{product}', [ProductDetailController::class, 'create'])->name('product-detail.create');

    // Route xử lý lưu chi tiết sản phẩm
    Route::post('/{product}/add-detail', [ProductDetailController::class, 'store'])->name('product-detail.store');
});








Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});
=======
});
>>>>>>> Stashed changes
