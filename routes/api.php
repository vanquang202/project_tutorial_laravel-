<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Web\CheckoutController;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('update-image-course/{id}', [CourseController::class, 'updateImageCourse']);
Route::post('upload-image-course/{id}', [CourseController::class, 'uploadImageCourse']);

Route::prefix('class')->group(function () {
    Route::post('', [CheckoutController::class, 'getCalendar'])->name('class.calendar');
});
Route::post('vocher', [CheckoutController::class, 'getVocher'])->name('checkout.vocher');