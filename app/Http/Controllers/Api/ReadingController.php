<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadingController extends Controller
{
    public function index()
    {
        return response()->json(
            Reading::with([
                'meter.resourceType'
            ])->latest()->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'resource_meter_id' => 'required|exists:resource_meters,id',
            'reading' => 'required|numeric',
        ]);

        $reading = Reading::create([
            'resource_meter_id' => $data['resource_meter_id'],
            'user_id' => auth()->id(),
            'reading_value' => $data['reading'],
            'reading_date' => now(),
        ]);

        return response()->json([
            'message' => 'Reading saved successfully',
            'data' => $reading,
        ], 201);
    }

    public function meters()
    {
        return response()->json(
            DB::table('resource_meters')
                ->select(
                    'id',
                    'meter_code',
                    'location'
                )
                ->get()
        );
    }

}