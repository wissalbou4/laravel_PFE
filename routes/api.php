<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Public routes (no authentication required)
Route::post('/login', [AuthController::class, 'login']); // User login

// Protected routes (require Sanctum authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Authentication routes
    Route::get('/dashboard', [AuthController::class, 'dashboard']); // Role-based dashboard
    Route::post('/logout', [AuthController::class, 'logout']); // User logout
    Route::get('/user', [AuthController::class, 'user']); // Get authenticated user

    Route::get('/users', [UserController::class, 'index']); // Fetch all users
    Route::post('/users', [UserController::class, 'store']); // Create a user
    Route::put('/users/{id}', [UserController::class, 'update']); // Update a user
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});