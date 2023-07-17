<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function viewAllGroups()
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

    public function getOneGroup($group_id)
    {
        try {
            $group = Group::select('id','groupName','genre','description','musicsNumber')->where('id', $group_id)->first();
            
            if(!$group){
                return response()->json([
                    'message' => 'Group not found'
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'message' => 'Group retrieved',
                'data' => $group,
                'success' => true
            ], Response::HTTP_OK);
            dd($group);
        } catch (\Throwable $th) {
            Log::error('Error getting group: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving group'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteMyAccount(){
        
        try {
            $user = auth()->user();
            $userFound = User::find($user->id);
            $userFound->delete();

            return response()->json([
                'message' => 'Delete profile ok'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting user' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function confirmTicket(Request $request){
        try {
            $user_id = auth()->user()->id;
            $concert_id = $request->input('concert_id');
            $booking = new Booking();
            $booking->user_id = $user_id;
            $booking->concert_id = $concert_id;
            $booking->confirmation = true;
            $reservation_code = Str::random(10);

            while (Booking::where('reservation_code', $reservation_code)->exists()){
                $reservation_code = Str::random(10);
            }

            $booking->reservation_code = $reservation_code;
            $booking->save();

            $booking->load('concert:id,title,date,groupName,description,programm', 'user:id,firstName,lastName');

            return response()->json([
                'message' => 'Book ticket done',
                'data' => $booking,
                'success' => true
            ]);

        } catch (\Throwable $th) {
            Log::error('Error booking your ticket: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error booking your ticket'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
