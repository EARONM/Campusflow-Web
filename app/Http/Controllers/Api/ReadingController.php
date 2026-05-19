<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ResourceMeter;
use App\Models\Alert;

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

        $meter = ResourceMeter::find(
            $data['resource_meter_id']
        );

        if ($meter) {

            // Max threshold exceeded
            if (

                !is_null(
                    $meter->max_threshold
                ) &&

                $reading->reading_value >
                $meter->max_threshold
            ) {

                $existingAlert = Alert::where(

                    'resource_meter_id',
                    $meter->id

                )->where(

                    'title',
                    'Threshold Exceeded'

                )->where(

                    'is_read',
                    false

                )->first();

                if (!$existingAlert) {

                    Alert::create([

                        'resource_meter_id' =>
                            $meter->id,

                        'user_id' =>
                            auth()->id(),

                        'title' =>
                            'Threshold Exceeded',

                        'severity' =>
                            'critical',

                        'message' =>

                            $meter->meter_code .

                            ' exceeded max threshold of ' .

                            $meter->max_threshold .

                            '. Current reading: ' .

                            $reading->reading_value,

                        'is_read' => false,
                    ]);
                }
            }

            // Min threshold warning
            if (

                !is_null(
                    $meter->min_threshold
                ) &&

                $reading->reading_value <
                $meter->min_threshold
            ) {

                $existingAlert = Alert::where(

                    'resource_meter_id',
                    $meter->id

                )->where(

                    'title',
                    'Threshold Warning'

                )->where(

                    'is_read',
                    false

                )->first();

                if (!$existingAlert) {

                    Alert::create([

                        'resource_meter_id' =>
                            $meter->id,

                        'user_id' =>
                            auth()->id(),

                        'title' =>
                            'Threshold Warning',

                        'severity' =>
                            'warning',

                        'message' =>

                            $meter->meter_code .

                            ' dropped below minimum threshold of ' .

                            $meter->min_threshold .

                            '. Current reading: ' .

                            $reading->reading_value,

                        'is_read' => false,
                    ]);
                }
            }
        }

        return response()->json([
            'message' => 'Reading saved successfully',
            'data' => $reading,
        ], 201);
    }

    public function meters(Request $request)
    {
        $type = strtolower(
            $request->type
        );

        $typeMap = [

            'water' =>
                'Water',

            'electricity' =>
                'Electric',

            'waste' =>
                'Waste',
        ];

        $resourceType =
            $typeMap[$type] ?? null;

        $query = ResourceMeter::query();

        // filter by resource type
        if ($resourceType) {

            $query->whereHas(
                'resourceType',
                function ($q) use ($resourceType) {

                    $q->where(
                        'name',
                        $resourceType
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