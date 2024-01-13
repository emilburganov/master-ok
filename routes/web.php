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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/registration', [\App\Http\Controllers\AuthController::class, 'getRegistration'])->name('registration.get');
    Route::post('/registration', [\App\Http\Controllers\AuthController::class, 'postRegistration'])->name('registration.post');

    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'getLogin'])->name('login.get');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'postLogin'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/applications', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.get');

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
