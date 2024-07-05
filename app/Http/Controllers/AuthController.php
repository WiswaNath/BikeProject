<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
     // Login method
     public function login(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'email' => 'required|string|email',
             'password' => 'required|string',
         ]);
 
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
 
         $user = User::where('email', $request->email)->first();
 
         if (! $user || ! Hash::check($request->password, $user->password)) {
             throw ValidationException::withMessages([
                 'email' => ['The provided credentials are incorrect.'],
             ]);
         }
 
         $token = $user->createToken('auth_token')->plainTextToken;
 
         return response()->json([
            'status' => 'success',
            'access_token' => $token, 
            'token_type' => 'Bearer',
            'data' => $user
        ], 200);
     }

     // Register method
    public function register(Request $request)
    {
        try {
            // Validasi input dari request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Buat token baru untuk user
            $token = $user->createToken('auth_token')->plainTextToken;

            // Kembalikan token sebagai respons
            return response()->json([
                'access_token' => $token, 
                'token_type' => 'Bearer'
        ], 201);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json([
                'error' => 'An error occurred during registration.'
            ], 500);
        }
    }

    public function users(){
        $users = User::all();
        return response()->json([
            'data' => $users,
        ]);
    }
}
