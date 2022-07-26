<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);
Route::prefix('course')->group(function () {
});
Route::prefix('category')->group(function () {
    Route::get('', [CategoryController::class, 'index'])->name('category.index');
    Route::get('add', [CategoryController::class, 'create'])->name('category.create');
    Route::post('add', [CategoryController::class, 'store'])->name(
        'category.store'
    );
    Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('edit/{id}', [CategoryController::class, 'update'])->name('category.update');
});
Route::prefix('classroom')->group(function () {
});
Route::prefix('student')->group(function () {
});
Route::prefix('calendar')->group(function () {
});
Route::prefix('voucher')->group(function () {
    Route::resource('',VoucherController::class,[
        "names" => [
            "index" => "voucher.index",
            "store" => "voucher.store",
            "create" => "voucher.create",
            "edit" => "voucher.edit",
            "update" => "voucher.update",
            "destroy" => "voucher.destroy",
        ]
    ])->parameters([
        '' => 'id',
    ]);
});

Route::get('login', [AuthController::class, 'login'])->name('auth.login');

Route::get('redirect', [AuthController::class, 'redirect'])->name('login.redirect');