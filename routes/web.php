<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CourseController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\CalendarController;
use App\Http\Controllers\Web\HistoryController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('redirect', [AuthController::class, 'redirect'])->name('login.redirect');
Route::get('callback', [AuthController::class, 'callback'])->name('login.callback');

Route::get('logout', function () {
    auth()->logout();
    return redirect()->route('web.home');
})->name('logout');

//Web
Route::get('shop', [HomeController::class, 'shop'])->name('shop');

Route::prefix('couser')->group(function () {
    Route::get('{id}', [CourseController::class, 'detailCouse'])->name('couser.detail');
});

Route::prefix('checkout')->middleware(['auth_check'])->group(function () {
    Route::get('', [CheckoutController::class, 'viewCheckout'])->name('checkout.view');
});

Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('history', [HistoryController::class, 'index'])->name('history.index');

Route::get('thankyou', function () {
    return view('pages.web.thankyou');
})->name('thankyou');
