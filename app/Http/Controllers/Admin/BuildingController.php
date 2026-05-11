<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Campus;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::with(
            'campus'
        )->latest()->get();

        return view(
            'admin.buildings.index',
            compact('buildings')
        );
    }

    public function create()
    {
        $campuses = Campus::all();

        return view(
            'admin.buildings.create',
            compact('campuses')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'campus_id' =>
                'required|exists:campuses,id',

            'name' =>
                'required|string|max:255',

        ]);

        Building::create([
            'campus_id' =>
                $request->campus_id,

            'name' =>
                $request->name,

        ]);

        return redirect()
            ->route('buildings.index')
            ->with(
                'success',
                'Building created successfully.'
            );
    }

    public function update(
        Request $request,
        Building $building
    )
    {
        $request->validate([

            'name' =>
                'required|string|max:255',

            'campus_id' =>
                'required|exists:campuses,id',
        ]);

        $building->update([

            'name' =>
                $request->name,

            'campus_id' =>
                $request->campus_id,
        ]);

        return redirect(
            '/database?section=buildings'
        )->with(
            'success',
            'Building updated successfully.'
        );
    }

    public function destroy(
        Building $building
    )
    {
        $building->delete();

        return redirect(
            '/database?section=buildings'
        )->with(
            'success',
            'Building deleted successfully.'
        );
    }

}