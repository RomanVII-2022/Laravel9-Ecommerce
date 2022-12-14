<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'adminAs'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories');
        Route::get('/addcategoty', 'create')->name('addcategory');
        Route::post('/category', 'store')->name('category');
        Route::get('/category/{category}/edit', 'edit')->name('editcategory');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products');
        Route::get('/addproduct', 'create')->name('addProduct');
    });

    Route::get('brands', [App\Http\Controllers\Admin\BrandController::class, 'index'])->name('brands');
});
