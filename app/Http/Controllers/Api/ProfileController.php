<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return response()->json([
            'name' => 'Juan Dela Cruz',
            'email' => 'juan@example.com',
            'role' => 'Admin'
        ]);
    }

    public function update()
    {
        return response()->json([
            'message' => 'Profile updated'
        ]);
    }
}