<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
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

Route::controller(QuestionController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/question/{slug}/detail', 'detail')->name('question.detail');
    Route::get('/question/{slug}/category', 'category')->name('category.name');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/user/create', 'create')->middleware('guest');
    Route::post('/user/create', 'post_create')->middleware('guest');
    Route::get('/user/login', 'login')->middleware('guest')->name('/user/login');
    Route::post('/user/login', 'post_login')->middleware('guest');
    Route::get('/user/logout', 'logout')->middleware('auth');
});
