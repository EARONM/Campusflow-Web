<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceMeter;
use App\Models\ResourceType;
use App\Models\Building;
use Illuminate\Http\Request;

class ResourceMeterController extends Controller
{
    public function index()
    {
        $meters = ResourceMeter::with([
            'building',
            'resourceType',
        ])->latest()->get();

        return view(
            'admin.resource-meters.index',
            compact('meters')
        );
    }

    public function create()
    {
        $buildings = Building::all();

        $types = ResourceType::all();

        return view(
            'admin.resource-meters.create',
            compact(
                'buildings',
                'types'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'building_id' =>
                'required|exists:buildings,id',

            'resource_type_id' =>
                'required|exists:resource_types,id',

            'meter_code' =>
                'required|string|max:255',

            'location' =>
                'required|string|max:255',
        ]);

        ResourceMeter::create([

            'building_id' =>
                $request->building_id,

            'resource_type_id' =>
                $request->resource_type_id,

            'meter_code' =>
                $request->meter_code,

            'location' =>
                $request->location,
        ]);

        return redirect()
            ->route('resource-meters.index')
            ->with(
                'success',
                'Meter created successfully.'
            );
    }

    public function update(
        Request $request,
        ResourceMeter $resourceMeter
    ) 
    {
        $request->validate([

            'building_id' =>
                'required|exists:buildings,id',

            'resource_type_id' =>
                'required|exists:resource_types,id',

            'meter_code' =>
                'required|string|max:255',

            'location' =>
                'required|string|max:255',
        ]);

        $resourceMeter->update([

            'building_id' =>
                $request->building_id,

            'resource_type_id' =>
                $request->resource_type_id,

            'meter_code' =>
                $request->meter_code,

            'location' =>
                $request->location,
        ]);

        return redirect()
            ->route('resource-meters.index')
            ->with(
                'success',
                'Meter updated successfully.'
            );
    }

    public function destroy(
        ResourceMeter $resourceMeter
    ) 
    {
        $resourceMeter->delete();

        return redirect()
            ->route('resource-meters.index')
            ->with(
                'success',
                'Meter deleted successfully.'
            );
    }

}