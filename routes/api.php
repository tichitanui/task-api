<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; // Move all "use" statements to the top

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Your new Professional API Routes
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);