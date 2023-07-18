<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AdminController extends Controller
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

    public function getOneUser(Request $request)
{
    try {
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');

        $query = User::query();

        if ($firstName) {
            $query->where('firstName', 'LIKE', "%{$firstName}%");
        }

        if ($lastName) {
            $query->where('lastName', 'LIKE', "%{$lastName}%");
        }

        $user = $query->firstOrFail();

        return response()->json([
            'message' => 'User retrieved',
            'data' => $user,
            'success' => true
        ], Response::HTTP_OK);
    } catch (\Throwable $th) {
        Log::error('Error getting user: ' . $th->getMessage());

        return response()->json([
            'message' => 'Error retrieving user'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    public function getAllGroups()
    {
        try {
            $groups = Group::select('id', 'groupName', 'genre', 'description', 'musicsNumber')->get();
            return response()->json([
                'message' => 'Groups retrieved',
                'data' => $groups,
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

    public function restoreAccount($id)
    {
        try {
            $user = User::withTrashed()->where('id', $id)->restore();

            return response()->json([
                'message' => 'User restored',
                'success' => true,
                'data' => $user
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error restoring user ' . $th->getMessage());

            return response()->json([
                'message' => 'Error restoring user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteGroup($id)
    {
        try {
            $user = auth()->user();
            $group = Group::find($id);

            if (!$group) {
                return response()->json([
                    'message' => "Group with id {$id} not found or role_id is not 2"
                ], Response::HTTP_NOT_IMPLEMENTED);
            }

            $group->delete();

            return response()->json([
                'message' => "Group deleted successfully",
                'success' => true,
                'data' => $group

            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting group: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting group'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function restoreGroup($id)
    {
        try {
            $group = Group::withTrashed()->where('id', $id)->restore();

            return response()->json([
                'message' => 'Group restored',
                'success' => true,
                'data' => $group
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error restoring group ' . $th->getMessage());

            return response()->json([
                'message' => 'Error restoring group'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
