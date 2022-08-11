<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\SinhVienTest;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\SearchController;
use Carbon\Carbon;

Route::middleware('auth:api')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('update-image-course/{id}', [CourseController::class, 'updateImageCourse']);
Route::post('upload-image-course/{id}', [CourseController::class, 'uploadImageCourse']);

Route::prefix('class')->group(function () {
    Route::post('', [CheckoutController::class, 'getCalendar'])->name('class.calendar');
});

Route::post('vocher', [CheckoutController::class, 'getVocher'])->name('checkout.vocher');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout.submit');
Route::post('search', [SearchController::class, 'search'])->name("api.seach");

// Route::post("store-sv", [SinhVienTest::class, 'store']);
// Route::get("sv", [SinhVienTest::class, 'list']);
// Route::post("login", function () {
//     $arr = [];
//     $user = \App\Models\User::where('email', request()->email)->first();
//     $arr['status'] = true;
//     // $arr['payload']['token'] = $user->createToken('token')->accessToken;
//     $tokenResult = $user->createToken('token');
//     $token = $tokenResult->token;
//     $token->expires_at = Carbon::now()->addDays(30);
//     $token->save();
//     $arr['payload']['user'] = $user;
//     $arr['payload']['token'] = $tokenResult->accessToken;
//     $arr['payload']['expires_at'] = Carbon::parse($tokenResult->token->expires_at)->toDateTimeString();
//     return response()->json($arr);
// });
// Route::get("logout", function () {
//     request()->user()->token()->revoke();
//     return response()->json(['status' => true]);
// });
