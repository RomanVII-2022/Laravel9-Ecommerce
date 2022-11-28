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
    Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');
    Route::get('addcategoty', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('addcategory');
    Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category');
});
