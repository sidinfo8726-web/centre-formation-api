<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FormationController;
use App\Http\Controllers\Api\InscriptionController;
use App\Http\Controllers\Api\PaiementController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('formations', FormationController::class);
    Route::apiResource('inscriptions', InscriptionController::class);
    Route::apiResource('paiements', PaiementController::class);

});