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
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum', 'isAdmin');

// USERS CONTROLLER
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');
// Route::put('/users/{id}', [UserController::class, 'updateMyProfile'])->middleware('auth:sanctum');
Route::put('/users', [UserController::class, 'updateMyProfile'])->middleware('auth:sanctum');
Route::get('/groups', [UserController::class, 'getAllGroups']);
Route::get('/groups/{group_id}', [UserController::class, 'getOneGroup']);
Route::get('/groups/genre/{genre}', [UserController::class, 'getGroupByGenre']);
Route::get('/my-tickets', [UserController::class, 'getMyTickets'])->middleware('auth:sanctum');;
Route::delete('/users/delete', [UserController::class, 'deleteMyAccount'])->middleware('auth:sanctum');
Route::post('/confirm-ticket', [UserController::class, 'confirmTicket'])->middleware('auth:sanctum');

// ADMIN CONTROLLER
Route::get('/users', [AdminController::class, 'getAllUsers'])->middleware('auth:sanctum', 'isAdmin');
Route::put('/users', [AdminController::class, 'updateAdminProfile'])->middleware('auth:sanctum', 'isAdmin');
Route::delete('/user/delete/{id}', [AdminController::class, 'deleteUser'])->middleware('auth:sanctum', 'isAdmin');
// allGroups dejarlo publico
// Route::get('/groups', [UserController::class, 'getAllGroups'])->middleware('auth:sanctum', 'isAdmin');
// Route::post('/users/restore/{id}', [AdminController::class, 'restoreAccount'])->middleware('auth:sanctum', 'isAdmin');
Route::post('/users/restore/{id}', [AdminController::class, 'restoreAccount']);
Route::delete('/group/{id}', [AdminController::class, 'deleteGroup'])->middleware('auth:sanctum', 'isAdmin');
Route::post('/group/{id}', [AdminController::class, 'restoreGroup'])->middleware('auth:sanctum', 'isAdmin');
// Search by ID
Route::get('/user/{id}', [AdminController::class, 'getOneUser'])->middleware('auth:sanctum', 'isAdmin');
// Search by Name and Surname
Route::get('/user', [AdminController::class, 'getOneUser'])->middleware('auth:sanctum', 'isAdmin');





