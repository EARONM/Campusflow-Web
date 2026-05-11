<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use App\Models\ResourceType;
use App\Models\ResourceMeter;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('database', [

            'users' =>
                User::with([
                    'role',
                    'campus',
                ])->latest()->get(),

            'campuses' =>
                Campus::latest()->get(),

            'buildings' =>
                Building::with(
                    'campus'
                )->latest()->get(),

            'resourceTypes' =>
                ResourceType::latest()->get(),

            'resourceMeters' =>
                ResourceMeter::with([
                    'building',
                    'resourceType',
                ])->latest()->get(),
        ]);
    }
}