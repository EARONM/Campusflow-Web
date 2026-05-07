<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Campus;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::with('campus')
            ->latest()
            ->get();

        return view(
            'buildings.index',
            compact('buildings')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campuses = Campus::all();

        return view(
            'buildings.create',
            compact('campuses')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'campus_id' => 'required|exists:campuses,id',
            'name' => 'required|string|max:255',
        ]);

        Building::create([
            'campus_id' => $request->campus_id,
            'name' => $request->name,
        ]);

        return redirect()
            ->route('buildings.index')
            ->with('success', 'Building created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return view(
            'buildings.show',
            compact('building')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        $campuses = Campus::all();

        return view(
            'buildings.edit',
            compact(
                'building',
                'campuses'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Building $building
    ) {

        $request->validate([
            'campus_id' => 'required|exists:campuses,id',
            'name' => 'required|string|max:255',
        ]);

        $building->update([
            'campus_id' => $request->campus_id,
            'name' => $request->name,
        ]);

        return redirect()
            ->route('buildings.index')
            ->with('success', 'Building updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();

        return back()
            ->with('success', 'Building deleted');
    }
}