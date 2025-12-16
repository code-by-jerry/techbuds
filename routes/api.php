<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes (no authentication required)
Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,15'); // 5 attempts per 15 minutes

Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->middleware('throttle:3,60'); // 3 attempts per 60 minutes

Route::post('/reset-password', [AuthController::class, 'resetPassword']);

// Protected routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Add other protected routes here
    // Route::get('/user', [AuthController::class, 'user']);
});


