<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome',[
        'data' => \App\Models\Test::paginate(1)
    ]);
});
Route::get('/create',function () {})->name('create');
Route::get('/update/{id}',function () {})->name('update');
Route::delete('/delete/{id}',function () {})->name('delete');