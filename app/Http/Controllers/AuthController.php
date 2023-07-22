<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
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

    public function registerGroup(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'groupName' => 'required|string',
                'genre' => 'required|string',
                'description' => 'required|string',
                'musicsNumber' => 'required|integer',
                'image' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();
            $existing = Group::where('groupName', $validData['groupName'])->first();

            $userId = auth()->user()->id;
            $groupRole = 2;
            
            
            if ($existing) {
                return response()->json([
                    'message' => 'Ese grupo ya existe'
                ]);
            }

            $user = User::find($userId);
            $user->role_id = $groupRole;
            $user->save();
            
            $imageUrl = $request->input('image');
            $newGroup = Group::create([
                'image' => $imageUrl,
                'groupName' => $validData['groupName'],
                'genre' => $validData['genre'],
                'description' => $validData['description'],
                'musicsNumber' => $validData['musicsNumber'],
                'user_id' => $userId
            ]);

            return response()->json([
                'message' => 'Group registrado',
                'data' => $newGroup,
            ]);
        } catch (\Throwable $th) {
            Log::error('Error getting group' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating group'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email' => 'Email or password are invalid',
                'password' => 'Email or password are invalid'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();
            $user = User::where('email', $validData['email'])->first();
            

            if (!$user) {
                return response()->json([
                    'message' => 'Email or password are invalid'
                ], Response::HTTP_FORBIDDEN);
            }

            if (!Hash::check($validData['password'], $user->password)) {
                return response()->json([
                    'message' => 'Email or password are invalid'
                ], Response::HTTP_FORBIDDEN);
            }

            // $role_id = $user->role_id;
            $token = $user->createToken('apiToken')->plainTextToken;
            
            return response()->json([
                'message' => 'User logged',
                'data' => $user,
                // 'role_id' => $role_id,
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            Log::error('Error getting user' . $th->getMessage());

            return response()->json([
                'message' => 'Error creating user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // public function profile(){
    //     try {
    //         $user = auth()->user();

    //         return response()->json([
    //             'message' => 'Perfil recuperado',
    //             'data' => $user,
    //             'success' => true
    //         ], Response::HTTP_FORBIDDEN);
    //     } catch (\Throwable $th) {
    //         Log::error('Error getting tasks' . $th->getMessage());

    //         return response()->json([
    //             'message' => 'Error getting profile'
    //         ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    // }

    public function logout(Request $request)
    {
        try {

            $headerToken = $request->bearerToken();
            $token = PersonalAccessToken::findToken($headerToken);
            $token->delete();

            return response()->json([
                'message' => 'Usuario deslogueado'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deslogueando usuario' . $th->getMessage());

            return response()->json([
                'message' => 'Error deslogueando usuario'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
