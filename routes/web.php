<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/* Admin */
// Home
Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->middleware(['auth', 'admin'])->name('adminHome');

// Category
Route::get('/admin/view-category', [AdminController::class, 'adminViewCategory'])->middleware(['auth', 'admin'])->name('adminViewCategory');
Route::post('/admin/add-category', [AdminController::class, 'adminAddCategory'])->middleware(['auth', 'admin'])->name('adminAddCategory');
