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

    public function meters(Request $request)
    {
        $type = $request->type;

        $query = ResourceMeter::query();

        // filter by resource type
        if ($type) {

            $query->whereHas(
                'resourceType',
                function ($q) use ($type) {

                    $q->whereRaw(
                        'LOWER(name) = ?',
                        [strtolower($type)]
                    );
                }
            );
        }

        // logged in user
        $user = auth()->user();

        // campus filtering
        if (
            $user &&
            $user->campus_id
        ) {

            $query->whereHas(
                'building',
                function ($q) use ($user) {

                    $q->where(
                        'campus_id',
                        $user->campus_id
                    );
                }
            );
        }

        return response()->json(
            $query->select(
                'id',
                'meter_code',
                'location'
            )->get()
        );
    }

}