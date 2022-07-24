<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class , 'index']);
Route::get('login', [AuthController::class , 'login'])->name('auth.login');
Route::get('redirect', [AuthController::class , 'redirect'])->name('login.redirect');