<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\ResourceMeter;
use App\Models\ResourceType;
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
            'resource-meters.index',
            compact('meters')
        );
    }

    public function create()
    {
        $buildings = Building::all();

        $resourceTypes = ResourceType::all();

        return view(
            'resource-meters.create',
            compact(
                'buildings',
                'resourceTypes'
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
                'Meter created'
            );
    }

    public function edit(
        ResourceMeter $resource_meter
    ) {

        $buildings = Building::all();

        $resourceTypes = ResourceType::all();

        return view(
            'resource-meters.edit',
            [
                'meter' => $resource_meter,
                'buildings' => $buildings,
                'resourceTypes' => $resourceTypes,
            ]
        );
    }

    public function update(
        Request $request,
        ResourceMeter $resource_meter
    ) {

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

        $resource_meter->update([
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
                'Meter updated'
            );
    }

    public function destroy(
        ResourceMeter $resource_meter
    ) {

        $resource_meter->delete();

        return back()
            ->with(
                'success',
                'Meter deleted'
            );
    }
}