<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceType;
use Illuminate\Http\Request;

class ResourceTypeController extends Controller
{
    public function index()
    {
        $types = ResourceType::latest()
            ->get();

        return view(
            'admin.resource-types.index',
            compact('types')
        );
    }

    public function create()
    {
        return view(
            'admin.resource-types.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>
                'required|string|max:255|unique:resource_types,name',
        ]);

        ResourceType::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('resource-types.index')
            ->with(
                'success',
                'Resource type created.'
            );
    }

    public function update(
        Request $request,
        ResourceType $resourceType
    )
    {
        $request->validate([

            'name' =>
                'required|string|max:255',
        ]);

        $resourceType->update([

            'name' =>
                $request->name,
        ]);

        return redirect(
            '/database?section=resource-types'
        )->with(
            'success',
            'Resource type updated successfully.'
        );
    }

    public function destroy(
        ResourceType $resourceType
    )
    {
        $resourceType->delete();

        return redirect(
            '/database?section=resource-types'
        )->with(
            'success',
            'Resource type deleted successfully.'
        );
    }

}