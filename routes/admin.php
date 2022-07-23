<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class , 'login'])->name('auth.login');
Route::get('redirect', [AuthController::class , 'redirect'])->name('login.redirect');