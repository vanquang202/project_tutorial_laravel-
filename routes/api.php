<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\SearchController;

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});
Route::post("login",function () {
    $arr = [];
    $user = \App\Models\User::where('email',request()->email)->first();
    $arr['token'] = $user->createToken('token')->accessToken;
    $arr['user'] = $user;
    return response()->json($arr);
});

Route::post('update-image-course/{id}', [CourseController::class, 'updateImageCourse']);
Route::post('upload-image-course/{id}', [CourseController::class, 'uploadImageCourse']);

Route::prefix('class')->group(function () {
    Route::post('', [CheckoutController::class, 'getCalendar'])->name('class.calendar');
});

Route::post('vocher', [CheckoutController::class, 'getVocher'])->name('checkout.vocher');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout.submit');
Route::post('search',[SearchController::class,'search'])->name("api.seach");