<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile()
    {
        try {
            $user = auth()->user();

            return response()->json([
                'message' => 'Perfil recuperado',
                'data' => $user,
                'success' => true
            ], Response::HTTP_FORBIDDEN);
        } catch (\Throwable $th) {
            Log::error('Error getting tasks' . $th->getMessage());

            return response()->json([
                'message' => 'Error getting profile'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateMyProfile(Request $request)
    {
        try {
            $user = auth()->user();
            $id = $user->id;

            $validator = Validator::make($request->all(), [
                'address' => 'nullable|string',
                'phoneNumber' => [
                    'nullable',
                    'regex:/^\d{9}$/',
                ],
                'role_id' => 'nullable'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
            }

            $validData = $validator->validated();

            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => "User with id {$id} not found"], Response::HTTP_NOT_FOUND);
            }

            $user->update($validData);

            return response()->json([
                'message' => 'User updated successfully',
                'data' => $user,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error updating user: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error updating user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteMyAccount()
    {

        try {
            $user = auth()->user();
            $userFound = User::find($user->id);
            $userFound->delete();

            return response()->json([
                'message' => 'DProfile deleted'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting user' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function confirmTicket(Request $request)
    {
        try {
            $user_id = auth()->user()->id;
            $concert_id = $request->input('concert_id');
            $booking = new Booking();
            $booking->user_id = $user_id;
            $booking->concert_id = $concert_id;
            $booking->confirmation = true;
            $reservation_code = Str::random(10);

            while (Booking::where('reservation_code', $reservation_code)->exists()) {
                $reservation_code = Str::random(10);
            }

            $booking->reservation_code = $reservation_code;
            $booking->save();

            $booking->load('concert:id,title,date,groupName,description,programm', 'user:id,firstName,lastName');

            return response()->json([
                'message' => 'Book ticket done',
                'data' => $booking,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error booking your ticket: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error booking your ticket'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function myFavorite(Request $request){
        try {
            $user_id = auth()->user()->id;
            $concert_id = $request->input('concert_id');
            $booking = new Booking();
            $booking->user_id = $user_id;
            $booking->concert_id = $concert_id;
            $booking->favorite = true;

            $booking->save();
            $booking->load('concert:id,title,date,groupName,programm', 'user:id');

            return response()->json([
                'message' => 'Added in your favorite',
                'data' => $booking,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Can not add to favorites:' . $th->getMessage());

            return response()->json([
                'message' => 'Can not add to favorites'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getMyTickets()
    {
        try {
            $user_id = auth()->user()->id;
            $bookings = Booking::where('user_id', $user_id)->get();

            if ($bookings->isEmpty()) {
                return response()->json([
                    'message' => 'No reservation found'
                ]);
            }

            $bookings->load('concert:id,title,date,groupName', 'user:id,firstName,lastName');

            return response()->json([
                'message' => 'Reservations retrieved',
                'data' => $bookings,
                'success' => true
            ]);
        } catch (\Throwable $th) {
            Log::error('Error booking your ticket: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error booking your ticket'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getMyGroup()
    {
        try {
            $user_id = auth()->id();
            // Obtener el grupo asociado al user_id utilizando la relación definida en el modelo Group
            $group = Group::where('user_id', $user_id)->first();

            if (!$group) {
                return response()->json([
                    'message' => 'User not associated with any group'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'message' => 'Group retrieved',
                'data' => $group,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error getting group: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving group'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateMyGroup(Request $request)
    {
        try {
            $user_id = auth()->id();
            $group = Group::where('user_id', $user_id)->first();

            if (!$group) {
                return response()->json([
                    'message' => 'User not associated with any group'
                ], Response::HTTP_NOT_FOUND);
            }

            $validatedData = $request->validate([
                'description' => 'required|string',
            ]);

            $group->update($validatedData);

            return response()->json([
                'message' => 'Group data updated successfully',
                'data' => $group,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error updating group: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error updating group'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllGroups()
    {
        try {
            $groups = Group::select('id', 'image', 'groupName', 'genre', 'description', 'musicsNumber')->get();
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

    public function getGroupByGenre($genre)
    {
        try {
            $groups = Group::where('genre', $genre)->get();

            return response()->json([
                'message' => 'Groups retrieved by genre',
                'data' => $groups,
                'success' => true
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error getting groups by genre:' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving groups by genre'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
