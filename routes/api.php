<?php

use App\Http\Controllers\Admin\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('update-image-course/{id}',[CourseController::class,'updateImageCourse']);
Route::post('upload-image-course/{id}',[CourseController::class,'uploadImageCourse']);