<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Campus;
use App\Models\Building;
use App\Models\ResourceMeter;
use App\Models\Reading;
use App\Models\ResourceType;
use Carbon\Carbon;
use App\Models\Alert;

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

        $currentMonthStart =
            Carbon::now()->startOfMonth();

        $previousMonthStart =
            Carbon::now()
                ->subMonth()
                ->startOfMonth();

        $previousMonthEnd =
            Carbon::now()
                ->subMonth()
                ->endOfMonth();

        $currentWaterUsage = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Water'
                );
            }
        )
        ->whereDate(
            'created_at',
            '>=',
            $currentMonthStart
        )
        ->sum('reading_value');

        $previousWaterUsage = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Water'
                );
            }
        )
        ->whereBetween(
            'created_at',
            [
                $previousMonthStart,
                $previousMonthEnd
            ]
        )
        ->sum('reading_value');

        $waterPercentage = 0;

        if ($previousWaterUsage > 0) {

            $waterPercentage =
                (
                    (
                        $currentWaterUsage -
                        $previousWaterUsage
                    ) /
                    $previousWaterUsage
                ) * 100;
        }

        $alerts = [];

        // high water usage
        if ($currentWaterUsage > 2000) {

            $alerts[] = [

                'title' =>
                    'High Water Usage',

                'count' =>
                    number_format(
                        $currentWaterUsage,
                        2
                    ),
            ];
        }

        // inactive meters
        $inactiveMeters = ResourceMeter::doesntHave(
            'readings'
        )->count();

        if ($inactiveMeters > 0) {

            $alerts[] = [

                'title' =>
                    'Inactive Meters',

                'count' =>
                    $inactiveMeters,
            ];
        }

        // missing readings today
        $missingReadings = ResourceMeter::whereDoesntHave(
            'readings',
            function ($q) {

                $q->whereDate(
                    'created_at',
                    today()
                );
            }
        )->count();

        if ($missingReadings > 0) {

            $alerts[] = [

                'title' =>
                    'Missing Daily Readings',

                'count' =>
                    $missingReadings,
            ];
        }

        $latestReadings = Reading::with(
            'meter'
        )->latest()->take(20)->get();

        foreach ($latestReadings as $reading) {

            $meter = $reading->meter;

            if (
                $meter &&
                $meter->max_threshold &&
                $reading->reading_value >
                $meter->max_threshold
            ) {

                $alerts[] = [

                    'title' =>
                        'Threshold Exceeded',

                    'count' =>
                        $meter->meter_code,
                ];
            }
        }

        $thresholdExceeded = Reading::whereHas(
            'meter',
            function ($q) {

                $q->whereNotNull(
                    'max_threshold'
                );
            }
        )
        ->whereHas(
            'meter',
            function ($q) {

                $q->whereColumn(
                    'resource_readings.reading_value',
                    '>',
                    'resource_meters.max_threshold'
                );
            }
        )
        ->count();

        $alerts = Alert::latest()
            ->take(5)
            ->get();

        $unreadAlerts = Alert::where(
            'is_read',
            false
        )->count();

        return view('dashboard', [

            'alerts' =>
                $alerts,

            'thresholdExceeded' =>
                $thresholdExceeded,

            'unreadAlerts' =>
                $unreadAlerts,

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

            'currentWaterUsage' =>
                $currentWaterUsage,

            'previousWaterUsage' =>
                $previousWaterUsage,

            'waterPercentage' =>
                round($waterPercentage, 1),
        ]);
    }

    public function liveData()
    {
        $latestReadings = Reading::with([
            'meter.resourceType'
        ])
        ->latest()
        ->take(5)
        ->get();

        $alerts =
            Alert::latest()
            ->take(5)
            ->get();

        return response()->json([

            'latestReadings' =>
                $latestReadings,

            'alerts' =>
                $alerts,
        ]);
    }

}