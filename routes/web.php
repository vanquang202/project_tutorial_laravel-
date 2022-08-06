<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CourseController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\CalendarController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('redirect', [AuthController::class, 'redirect'])->name('login.redirect');
Route::get('callback', [AuthController::class, 'callback'])->name('login.callback');
//Web
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::prefix('couser')->group(function () {
    Route::get('{id}', [CourseController::class, 'detailCouse'])->name('couser.detail');
});
Route::prefix('checkout')->middleware(['auth'])->group(function () {
    Route::get('', [CheckoutController::class, 'viewCheckout'])->name('checkout.view');
});
Route::get('calendar',[CalendarController::class,'index'])->name('calendar.index');
Route::get('thankyou', function () {
    return view('pages.web.thankyou');
})->name('thankyou');

Route::get('mail', function () {
    return view('mails.email');
});
