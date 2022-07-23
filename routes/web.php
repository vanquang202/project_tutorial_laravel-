<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/dashboard', function () {
    return view('pages.index');
});

Route::get('login',[AuthController::class , 'login']);

// Route::get('/create',function () {})->name('create');
// Route::get('/update/{id}',function () {})->name('update');
// Route::delete('/delete/{id}',function () {})->name('delete');