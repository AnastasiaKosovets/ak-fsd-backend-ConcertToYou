<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER
Route::post('/register', [AuthController::class, 'register']);
Route::post('/registerGroup', [AuthController::class, 'registerGroup'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// USERS CONTROLLER
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');
Route::put('/users/{id}', [UserController::class, 'updateMyProfile'])->middleware('auth:sanctum');
// Route::get('/groupView', [UserController::class, 'viewAllGroups']);
Route::get('/groups', [UserController::class, 'getAllGroups']);
Route::get('/groups/{group_id}', [UserController::class, 'getOneGroup']);
Route::get('/my-tickets', [UserController::class, 'getMyTickets'])->middleware('auth:sanctum');;
Route::delete('/users/delete', [UserController::class, 'deleteMyAccount'])->middleware('auth:sanctum');
Route::post('/confirm-ticket', [UserController::class, 'confirmTicket'])->middleware('auth:sanctum');


// ADMIN CONTROLLER
Route::get('/users', [AdminController::class, 'getAllUsers'])->middleware('auth:sanctum', 'isAdmin');
Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->middleware('auth:sanctum', 'isAdmin');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
