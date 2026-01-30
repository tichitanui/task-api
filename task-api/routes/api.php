<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- Task API Routes ---
Route::get('/tasks', [TaskController::class, 'index']);      // List all
Route::post('/tasks', [TaskController::class, 'store']);    // Create new
Route::put('/tasks/{task}', [TaskController::class, 'update']);    // Update specific ID
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']); // Delete specific ID