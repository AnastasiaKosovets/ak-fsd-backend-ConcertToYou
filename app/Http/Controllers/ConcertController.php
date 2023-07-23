<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

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
}
