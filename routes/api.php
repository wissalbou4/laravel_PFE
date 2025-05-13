<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
// <<<<<<< HEAD

// =======
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\OrdonnanceController;
// >>>>>>> b732f1754f19f485e201bc634df993c9931845f8
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
// <<<<<<< HEAD



// =======
Route::prefix("patients")->group(function () {
    Route::get("/", [PatientController::class, "index"]);
    Route::post("/", [PatientController::class, "store"]);
    Route::get("/{id}", [PatientController::class, "show"]);
    Route::put("/{id}", [PatientController::class, "update"]);
    Route::delete("/{id}", [PatientController::class, "destroy"]);
});
Route::prefix("rendezvous")->group(function () {
    Route::get("/", [RendezVousController::class,"index"]);
    Route::post("/", [RendezVousController::class,"store"]);
    Route::get("/{id}", [RendezVousController::class,"show"]);  
    Route::put("/{id}", [RendezVousController::class,"update"]);
    Route::delete("/{id}", [RendezVousController::class,"destroy"]);
    Route::get("/patients/{patient_id}/rendezvous", [RendezVousController::class,"getByPatient"]);
});
Route::prefix("factures")->group(function () {
    Route::get("/", [FactureController::class,"index"]);
    Route::post("/", [FactureController::class,"store"]);
    Route::put("/{id}", [FactureController::class,"update"]);
    Route::delete("/{id}", [FactureController::class,"destroy"]);
    Route::get("/patients/{patient_id}/factures", [FactureController::class,"getByPatient"]);
});
// route dashbord static=============
Route::get('/statistiques',[StatistiqueController::class,'getDashboardStats']);
// >>>>>>> b732f1754f19f485e201bc634df993c9931845f8
Route::prefix("ordonnances")->group(function () {
    Route::get("/", [OrdonnanceController::class,"index"]);
    Route::post("/", [OrdonnanceController::class,"store"]);
    Route::put("/{id}", [OrdonnanceController::class,"update"]);
    Route::delete("/{id}", [OrdonnanceController::class,"destroy"]);
    Route::get("/patients/{patient_id}/ordonnances", [OrdonnanceController::class,"getByPatient"]);
});
