<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EtudiantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('inscriptions', InscriptionController::class);

// ROUTES PROTÉGÉES
Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('etudiants', EtudiantController::class);
    Route::apiResource('formations', FormationController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
Route::put('/formations/{id}', [FormationController::class, 'update']);
Route::delete('/formations/{id}', [FormationController::class, 'destroy']);});