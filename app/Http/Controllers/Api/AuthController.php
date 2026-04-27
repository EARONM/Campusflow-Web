<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            return response()->json([
                'success' => true,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role ?? 'User',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials'
        ], 401);
    }

    public function register(Request $request)
    {
        return response()->json([
            'message' => 'Register route working'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}