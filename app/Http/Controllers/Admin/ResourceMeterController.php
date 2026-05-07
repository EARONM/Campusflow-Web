<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceMeter;
use Illuminate\Http\Request;

class ResourceMeterController extends Controller
{
    public function index(Request $request)
    {
        $type = strtolower(
            $request->type
        );

        $meters = ResourceMeter::query()

            ->when($type, function (
                $query
            ) use ($type) {

                $query->whereHas(
                    'resourceType',
                    function ($q) use ($type) {

                        $q->whereRaw(
                            'LOWER(name) = ?',
                            [$type]
                        );
                    }
                );
            })

            ->select(
                'id',
                'meter_code',
                'location'
            )

            ->orderBy('location')

            ->get();

        return response()->json(
            $meters
        );
    }
}