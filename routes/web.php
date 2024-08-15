<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/applications', [ApplicationController::class, 'index'])->middleware(CheckManager::class)->name('applications.index');
Route::get('/application', [ApplicationController::class, 'create']);
Route::post('/application', [ApplicationController::class, 'store'])->name('store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


