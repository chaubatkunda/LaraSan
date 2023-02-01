<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', RegisterController::class);
});

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::get('/dashboard', DashboardController::class);

    Route::apiResources([
        'user' => UserController::class
    ]);
});
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth:sanctum');
