<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Home
Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'userDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/product/{id}', [HomeController::class, 'userProduct'])->name('userProduct');
Route::get('/add-cart/{id}', [HomeController::class, 'userAddCart'])->middleware(['auth', 'verified'])->name('userAddCart');

// Cart
Route::get('/user-cart', [HomeController::class, 'userCart'])->middleware(['auth', 'verified'])->name('userCart');
Route::get('/delete-product-cart/{id}', [HomeController::class, 'userDeleteProductCart'])->middleware(['auth', 'verified'])->name('userDeleteProductCart');

// Order
Route::post('/order-product', [HomeController::class, 'userOrderProduct'])->middleware(['auth', 'verified'])->name('userOrderProduct');

/* Admin */
// Dashboard
Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->middleware(['auth', 'admin'])->name('adminHome');

// Category
Route::get('/admin/view-category', [AdminController::class, 'adminViewCategory'])->middleware(['auth', 'admin'])->name('adminViewCategory');
Route::post('/admin/add-category', [AdminController::class, 'adminAddCategory'])->middleware(['auth', 'admin'])->name('adminAddCategory');
Route::get('/admin/edit-category/{id}', [AdminController::class, 'adminEditCategory'])->middleware(['auth', 'admin'])->name('adminEditCategory');
Route::post('/admin/update-category/{id}', [AdminController::class, 'adminUpdateCategory'])->middleware(['auth', 'admin'])->name('adminUpdateCategory');
Route::get('/admin/delete-category/{id}', [AdminController::class, 'adminDeleteCategory'])->middleware(['auth', 'admin'])->name('adminDeleteCategory');

// Product
Route::get('/admin/view-product', [AdminController::class, 'adminShowProduct'])->middleware(['auth', 'admin'])->name('adminShowProduct');
Route::get('/admin/search-product', [AdminController::class, 'adminSearchProduct'])->middleware(['auth', 'admin'])->name('adminSearchProduct');
Route::get('/admin/add-product', [AdminController::class, 'adminAddProduct'])->middleware(['auth', 'admin'])->name('adminAddProduct');
Route::post('/admin/store-product', [AdminController::class, 'adminStoreProduct'])->middleware(['auth', 'admin'])->name('adminStoreProduct');
Route::get('/admin/edit-product/{id}', [AdminController::class, 'adminEditProduct'])->middleware(['auth', 'admin'])->name('adminEditProduct');
Route::post('/admin/update-product/{id}', [AdminController::class, 'adminUpdateProduct'])->middleware(['auth', 'admin'])->name('adminUpdateProduct');
Route::get('/admin/delete-product/{id}', [AdminController::class, 'adminDeleteProduct'])->middleware(['auth', 'admin'])->name('adminDeleteProduct');

// Order
Route::get('/admin/view-order', [AdminController::class, 'adminShowOrder'])->middleware(['auth', 'admin'])->name('adminShowOrder');
Route::get('/admin/search-order-product', [AdminController::class, 'adminSearchOrderProduct'])->middleware(['auth', 'admin'])->name('adminSearchOrderProduct');
Route::get('/admin/process-otw/{id}', [AdminController::class, 'adminProcessOtw'])->middleware(['auth', 'admin'])->name('adminProcessOtw');
Route::get('/admin/process-delivered/{id}', [AdminController::class, 'adminProcessDelivered'])->middleware(['auth', 'admin'])->name('adminProcessDelivered');
Route::get('/admin/print-order-product/{id}', [AdminController::class, 'adminPrintOrderProduct'])->middleware(['auth', 'admin'])->name('adminPrintOrderProduct');
