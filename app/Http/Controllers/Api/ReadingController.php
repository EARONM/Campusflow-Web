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
        $reading = Reading::create($request->all());

        return response()->json([
            'message' => 'Reading saved',
            'data' => $reading
        ]);
    }
}