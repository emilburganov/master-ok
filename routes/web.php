<?php

use App\Http\Controllers\AdminApplicationsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/registration', [AuthController::class, 'getRegistration'])->name('registration.get');
    Route::post('/registration', [AuthController::class, 'postRegistration'])->name('registration.post');

    Route::get('/login', [AuthController::class, 'getLogin'])->name('login.get');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:2')->group(function () {
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
        Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
        Route::get('/applications/{application}/delete', [ApplicationController::class, 'destroy'])->name('applications.delete');
    });

    Route::middleware('role:1')->group(function () {
        Route::get('/admin-applications', [AdminApplicationsController::class, 'index'])->name('admin-applications.index');
        Route::post('/admin-applications/{application}/update', [AdminApplicationsController::class, 'update'])->name('admin-applications.update');

        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
    });
});
