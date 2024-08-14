<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/applications', [ApplicationController::class, 'index'])->middleware('auth');
Route::get('/application', [ApplicationController::class, 'create']);
Route::post('/application', [ApplicationController::class, 'store']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


