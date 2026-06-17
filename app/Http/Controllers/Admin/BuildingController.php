<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Campus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $query = Building::with(
            'campus'
        );

        // Campus filtering
        if (
            Auth::user()->role->name
            !== 'SuperAdmin'
        ) {

            $query->where(

                'campus_id',

                Auth::user()->campus_id
            );
        }

        $buildings = $query
            ->latest()
            ->get();

        return view(
            'admin.buildings.index',
            compact('buildings')
        );
    }

    public function create()
    {
        if (
            Auth::user()->role->name
            === 'SuperAdmin'
        ) {

            $campuses = Campus::all();

        } else {

            $campuses = Campus::where(

                'id',

                Auth::user()->campus_id
            )->get();
        }

        return view(
            'admin.buildings.create',
            compact('campuses')
        );
    }

    public function edit(Building $building)
    {
        if (
            Auth::user()->role->name
            === 'SuperAdmin'
        ) {

            $campuses = Campus::all();

        } else {

            $campuses = Campus::where(

                'id',

                Auth::user()->campus_id
            )->get();
        }

        return view(
            'admin.buildings.edit',
            compact(
                'building',
                'campuses'
            )
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

        $campusId = $request->campus_id;

        if (
            Auth::user()->role->name
            !== 'SuperAdmin'
        ) {

            $campusId =
                Auth::user()->campus_id;
        }

        Building::create([

            'campus_id' =>
                $campusId,

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