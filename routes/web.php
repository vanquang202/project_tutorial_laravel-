<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Web\Auth\AuthController;
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
    echo 'Login';
});

Route::get('login', [AuthController::class, 'login']);
Route::get('redirect', [AuthController::class, 'redirect'])->name('login.redirect');
Route::get('callback', [AuthController::class, 'callback'])->name('login.callback');

// Route::get('/create',function () {})->name('create');
// Route::get('/update/{id}',function () {})->name('update');
// Route::delete('/delete/{id}',function () {})->name('delete');
Route::prefix('admin')->group(function () {
    Route::get('', [DashboardController::class, 'index']);
    Route::prefix('course')->group(function () {
    });
    Route::prefix('category')->group(function () {
    });
    Route::prefix('classroom')->group(function () {
    });
    Route::prefix('student')->group(function () {
    });
    Route::prefix('calendar')->group(function () {
    });
    Route::prefix('voucher')->group(function () {
    });
});