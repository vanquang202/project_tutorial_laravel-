<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CourseController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\Auth\AuthController;

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

Route::get('login', [AuthController::class, 'login']);
Route::get('redirect', [AuthController::class, 'redirect'])->name('login.redirect');
Route::get('callback', [AuthController::class, 'callback'])->name('login.callback');

// Route::get('/create',function () {})->name('create');
// Route::get('/update/{id}',function () {})->name('update');
// Route::delete('/delete/{id}',function () {})->name('delete');


Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('test', function () {
    // $files = Storage::disk('public')->allFiles();
    // $rand_keys = array_rand($files, 5);
    // $r = [
    //     $files[$rand_keys[0]],
    //     $files[$rand_keys[1]],
    //     $files[$rand_keys[2]],
    //     $files[$rand_keys[3]],
    //     $files[$rand_keys[4]],
    // ];
    // dd(json_encode($r));



});
Route::prefix('couser')->group(function () {
    Route::get('{id}', [CourseController::class, 'detailCouse'])->name('couser.detail');
});

Route::prefix('checkout')->group(function () {
    Route::get('', [CheckoutController::class, 'viewCheckout'])->name('checkout.view');
});