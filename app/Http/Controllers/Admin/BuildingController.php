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
}