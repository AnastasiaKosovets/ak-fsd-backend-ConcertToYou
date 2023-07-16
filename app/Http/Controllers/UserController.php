<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = User::get();
            return response()->json([
                'message' => 'Users retrieved',
                'data' => $users,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error getting users' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving users'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllGroups()
    {
        try {
            $group_id = User::where('role_id', 2)->get();
            return response()->json([
                'message' => 'Groups retrieved',
                'data' => $group_id,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error getting groups' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving groups'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = auth()->user();
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'message' => "User with id {$id} not found"
                ], Response::HTTP_NOT_IMPLEMENTED);
            }
            $user->delete();
            return response()->json([
                'message' => "User deleted successfully",
                'success' => true,
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting user: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
