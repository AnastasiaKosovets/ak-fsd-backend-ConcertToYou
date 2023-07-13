<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()],
                'address' => 'required|string',
                'document' => ['required', 'regex:/^(\d{8}[A-Z]{1}|\d{7}[A-Z]{2})$/'],
                'dateOfBirth' => 'required|string',
                'phoneNumber' => ['required', 'regex:/^\d{9}$/']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            
            $validData = $validator->validated();
            $newUser = User::create([
                'firstName' => $validData['firstName'],
                'lastName' => $validData['lastName'],
                'email' => $validData['email'],
                'password' => bcrypt($validData['password']),
                'address' => $validData['address'],
                'document' => $validData['document'],
                'dateOfBirth' => $validData['dateOfBirth'],
                'phoneNumber' => $validData['phoneNumber'],
                'role_id' => 1
            ]);

            $token = $newUser->createToken('apiToken')->plainTextToken;

            return response()->json([
                'message' => 'User registered',
                'date' => $newUser,
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            Log::error('Error getting tasks' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
