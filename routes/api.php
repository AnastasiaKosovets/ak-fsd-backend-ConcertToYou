<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum', 'isAdmin');

// GENERAL
Route::get('/groups', [UserController::class, 'getAllGroups']);
Route::get('/groups/genre/{genre}', [UserController::class, 'getGroupByGenre']);
Route::get('/concerts', [ConcertController::class, 'getAllConcerts']);
Route::get('/concerts/groupName', [ConcertController::class, 'getConcertByGroupName']);

// USERS CONTROLLER
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth:sanctum');
Route::post('/registerGroup', [AuthController::class, 'registerGroup'])->middleware('auth:sanctum');
Route::put('/user/profile', [UserController::class, 'updateMyProfile'])->middleware('auth:sanctum');
Route::get('/my-tickets', [UserController::class, 'getMyTickets'])->middleware('auth:sanctum');
Route::delete('/users/delete', [UserController::class, 'deleteMyAccount'])->middleware('auth:sanctum');
Route::post('/confirm-ticket', [UserController::class, 'confirmTicket'])->middleware('auth:sanctum');

// ADMIN CONTROLLER
Route::get('/users', [AdminController::class, 'getAllUsers'])->middleware('auth:sanctum', 'isAdmin');
Route::put('/users', [AdminController::class, 'updateAdminProfile'])->middleware('auth:sanctum', 'isAdmin');
Route::delete('/user/delete/{id}', [AdminController::class, 'deleteUser'])->middleware('auth:sanctum', 'isAdmin');
// restore user account
Route::post('/users/restore/{id}', [AdminController::class, 'restoreAccount'])->middleware('auth:sanctum', 'isAdmin');
Route::put('/groups/admin/{id}', [AdminController::class, 'updateGroupAdmin'])->middleware('auth:sanctum', 'isAdmin');
Route::delete('/group/delete/{group_id}', [AdminController::class, 'deleteGroup'])->middleware('auth:sanctum', 'isAdmin');
Route::post('/group/restore/{group_id}', [AdminController::class, 'restoreGroup'])->middleware('auth:sanctum', 'isAdmin');
Route::delete('/concert/delete/{concert_id}', [ConcertController::class, 'deleteConcert'])->middleware('auth:sanctum', 'isAdmin');
Route::post('/concert/restore/{concert_id}', [ConcertController::class, 'restoreConcert'])->middleware('auth:sanctum', 'isAdmin');
Route::put('/concerts/admin/{concert_id}', [ConcertController::class, 'updateAdminConcert'])->middleware('auth:sanctum', 'isAdmin');
// Search by ID
Route::get('/user/{id}', [AdminController::class, 'getOneUser'])->middleware('auth:sanctum', 'isAdmin');
// Search by Name and Surname
Route::get('/user', [AdminController::class, 'getOneUser'])->middleware('auth:sanctum', 'isAdmin');

// GROUP CONTROLLER
Route::post('/createConcert', [ConcertController::class, 'createConcert'])->middleware('auth:sanctum', 'isGroup');
Route::get('/groups/myGroup', [UserController::class, 'getMyGroup'])->middleware('auth:sanctum', 'isGroup');
Route::put('/update-my-group', [UserController::class, 'updateMyGroup'])->middleware('auth:sanctum', 'isGroup');

// CONCERT CONTROLLER
Route::get('/groups/{group_id}/myConcerts', [ConcertController::class, 'getMyConcerts'])->middleware('auth:sanctum', 'isGroup');
Route::put('/concerts/{concert_id}', [ConcertController::class, 'updateMyConcert'])->middleware('auth:sanctum', 'isGroup');