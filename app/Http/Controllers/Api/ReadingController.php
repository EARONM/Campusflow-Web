<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reading;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index()
    {
        return response()->json(Reading::latest()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'module' => 'required|string',
            'source_name' => 'required|string',
            'reading' => 'required|numeric',
            'remarks' => 'nullable|string',
        ]);

        $reading = Reading::create($data);

        return response()->json([
            'message' => 'Reading saved',
            'data' => $reading
        ], 201);
    }
}