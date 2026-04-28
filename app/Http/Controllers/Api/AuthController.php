<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();

        $user->tokens()->delete();

        $token = $user
            ->createToken('mobile')
            ->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role ?? 'User',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    public function register(Request $request)
    {
        return response()->json([
            'message' => 'Register route working'
        ]);
    }
}