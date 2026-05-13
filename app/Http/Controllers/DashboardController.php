<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use App\Models\ResourceMeter;
use App\Models\Reading;
use App\Models\ResourceType;

class DashboardController extends Controller
{
    public function index()
    {

        $waterReadings = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Water'
                );
            }
        )
        ->selectRaw('DATE(created_at) as date')
        ->selectRaw('SUM(reading_value) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->take(7)
        ->get();

        $electricReadings = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Electric'
                );
            }
        )
        ->selectRaw('DATE(created_at) as date')
        ->selectRaw('SUM(reading_value) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->take(7)
        ->get();

        $wasteReadings = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Waste'
                );
            }
        )
        ->selectRaw('DATE(created_at) as date')
        ->selectRaw('SUM(reading_value) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->take(7)
        ->get();

        $campusId = request('campus');

        return view('dashboard', [

            'totalUsers' =>
                User::count(),

            'totalCampuses' =>
                Campus::count(),

            'totalBuildings' =>
                Building::when(
                    $campusId,
                    function ($q) use ($campusId) {

                        $q->where(
                            'campus_id',
                            $campusId
                        );
                    }
                )->count(),

            'totalMeters' =>
                ResourceMeter::when(
                    $campusId,
                    function ($q) use ($campusId) {

                        $q->whereHas(
                            'building',
                            function ($b) use ($campusId) {

                                $b->where(
                                    'campus_id',
                                    $campusId
                                );
                            }
                        );
                    }
                )->count(),

            'latestReadings' =>
                Reading::with([
                    'meter.resourceType'
                ])
                ->when(
                    $campusId,
                    function ($q) use ($campusId) {

                        $q->whereHas(
                            'meter.building',
                            function ($b) use ($campusId) {

                                $b->where(
                                    'campus_id',
                                    $campusId
                                );
                            }
                        );
                    }
                )
                ->latest()
                ->take(5)
                ->get(),
            
            'chartLabels' =>
                $waterReadings
                    ->pluck('date'),

            'waterChartData' =>
                $waterReadings
                    ->pluck('total'),

            'electricChartData' =>
                $electricReadings
                    ->pluck('total'),

            'wasteChartData' =>
                $wasteReadings
                    ->pluck('total'),

            'campuses' =>
                Campus::all(),
        ]);
    }
}