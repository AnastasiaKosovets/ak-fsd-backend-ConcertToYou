<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ConcertController extends Controller
{
   public function getAllConcerts(){
    try {
        $concerts = Concert::select('id', 'image', 'title', 'date', 'groupName', 'description', 'programm')->get();
        return response()->json([
            'message' => 'Concerts retrieved',
            'data' => $concerts,
            'success' => true
        ], Response::HTTP_OK);
    } catch (\Throwable $th) {
        Log::error('Error getting concert' . $th->getMessage());

            return response()->json([
                'message' => 'Error retrieving concerts'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
   }

   public function deleteConcert($concert_id)
    {
        try {
            $concert = Concert::find($concert_id);
            if (!$concert) {
                return response()->json([
                    'message' => "Concert with id {$concert_id} not found or role_id is not 2"
                ], Response::HTTP_NOT_IMPLEMENTED);
            }

            $concert->delete();

            return response()->json([
                'message' => "Concert deleted successfully",
                'success' => true,
                'data' => $concert

            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting Concert: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting Concert'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function restoreConcert($concert_id)
    {
        try {
            $concert = Concert::withTrashed()->where('id', $concert_id)->restore();

            return response()->json([
                'message' => 'Concert restored',
                'success' => true,
                'data' => $concert
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error restoring concert ' . $th->getMessage());

            return response()->json([
                'message' => 'Error restoring concert'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function createConcert(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'group_id' => 'required|integer',
                'image' => 'required|string',
                'title' => 'required|string',
                'date' => 'required|string',
                'groupName' => 'required|string',
                'description' => 'required|string',
                'programm' => 'required|string', 
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();
            $existing = Concert::where('title', $validData['title'])->first();
            
            
            if ($existing) {
                return response()->json([
                    'message' => 'Title already exist'
                ]);
            }
            
            $imageUrl = $request->input('image');
            $newConcert = Concert::create([
                'group_id' => $validData['group_id'],
                'image' => $imageUrl,
                'title' => $validData['title'],
                'date' => $validData['date'],
                'groupName' => $validData['groupName'],
                'description' => $validData['description'],
                'programm' => $validData['programm'],
            ]);

            return response()->json([
                'message' => 'Concert registered',
                'data' => $newConcert,
            ]);
        } catch (\Throwable $th) {
            Log::error('Error getting concert' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating concert'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
