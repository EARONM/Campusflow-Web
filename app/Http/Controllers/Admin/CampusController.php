<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::latest()->get();

        return view(
            'campuses.index',
            compact('campuses')
        );
    }

    public function create()
    {
        return view('campuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Campus::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('campuses.index')
            ->with('success', 'Campus created');
    }

    public function edit(Campus $campus)
    {
        return view(
            'campuses.edit',
            compact('campus')
        );
    }

    public function update(
        Request $request,
        Campus $campus
    ) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $campus->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('campuses.index')
            ->with('success', 'Campus updated');
    }

    public function destroy(Campus $campus)
    {
        $campus->delete();

        return back()
            ->with('success', 'Campus deleted');
    }
}