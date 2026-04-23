<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return response()->json([
            'message' => 'Login route working'
        ]);
    }

    public function register(Request $request)
    {
        return response()->json([
            'message' => 'Register route working'
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Logout route working'
        ]);
    }
}