<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reading;
use App\Models\ResourceMeter;
use App\Models\Alert;
use Illuminate\Http\Request;

class ReadingApiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'resource_meter_id' =>
                'required|exists:resource_meters,id',

            'reading' =>
                'required|numeric',
        ]);

        $meter = ResourceMeter::find(
            $request->resource_meter_id
        );

        $reading = Reading::create([

            'resource_meter_id' =>
                $meter->id,

            'reading_value' =>
                $request->reading,
        ]);

        // Threshold checking
        if (
            !is_null($meter->max_threshold)
            &&
            $request->reading >
            $meter->max_threshold
        ) {

            Alert::create([

                'title' =>
                    'Threshold Exceeded',

                'message' =>
                    $meter->meter_code .
                    ' exceeded max threshold of ' .
                    $meter->max_threshold .
                    '. Current reading: ' .
                    $request->reading,

                'status' =>
                    'active',
            ]);
        }

        return response()->json([

            'success' => true,

            'message' =>
                'Reading submitted successfully.',
        ]);
    }
}