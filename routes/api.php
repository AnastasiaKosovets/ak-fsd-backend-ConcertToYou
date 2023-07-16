<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER
Route::post('/register', [AuthController::class, 'register']);
Route::post('/registerGroup', [AuthController::class, 'registerGroup'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// USERS CONTROLLER
Route::get('/users', [UserController::class, 'getAllUsers'])->middleware('auth:sanctum', 'isAdmin');
Route::delete('/users/{id}', [UserController::class, 'deleteUser'])->middleware('auth:sanctum', 'isAdmin');
Route::get('/groups', [UserController::class, 'getAllGroups'])->middleware('auth:sanctum', 'isAdmin');




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
