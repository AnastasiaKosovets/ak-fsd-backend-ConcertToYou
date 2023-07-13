<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER
Route::post('/register', [AuthController::class, 'register']);
Route::post('/registerGroup', [AuthController::class, 'registerGroup'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
