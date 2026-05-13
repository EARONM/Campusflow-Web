<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Models\Campus;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        $campusId =
            request('campus');

        // Water
        $waterStats = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Water'
                );
            }
        )
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
        ->selectRaw('DATE(created_at) as date')
        ->selectRaw('SUM(reading_value) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->take(30)
        ->get();

        // Electric
        $electricStats = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Electric'
                );
            }
        )
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
        ->selectRaw('DATE(created_at) as date')
        ->selectRaw('SUM(reading_value) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->take(30)
        ->get();

        // Waste
        $wasteStats = Reading::whereHas(
            'meter.resourceType',
            function ($q) {

                $q->where(
                    'name',
                    'Waste'
                );
            }
        )
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
        ->selectRaw('DATE(created_at) as date')
        ->selectRaw('SUM(reading_value) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->take(30)
        ->get();

        $topConsumer = Reading::select(

            'buildings.name as building_name',

            DB::raw(
                'SUM(resource_readings.reading_value) as total_usage'
            )

        )
        ->join(
            'resource_meters',
            'resource_readings.resource_meter_id',
            '=',
            'resource_meters.id'
        )
        ->join(
            'buildings',
            'resource_meters.building_id',
            '=',
            'buildings.id'
        )
        ->when(
            $campusId,
            function ($q) use ($campusId) {

                $q->where(
                    'buildings.campus_id',
                    $campusId
                );
            }
        )
        ->groupBy(
            'buildings.name'
        )
        ->orderByDesc(
            'total_usage'
        )
        ->first();

        $currentMonthUsage = Reading::whereMonth(
            'created_at',
            now()->month
        )
        ->sum(
            'reading_value'
        );

        $previousMonthUsage = Reading::whereMonth(
            'created_at',
            now()->subMonth()->month
        )
        ->sum(
            'reading_value'
        );

        $monthlyDifference =
            $currentMonthUsage -
            $previousMonthUsage;

        $monthlyPercentage =

            $previousMonthUsage > 0

            ? round(
                (
                    $monthlyDifference /
                    $previousMonthUsage
                ) * 100,
                2
            )

            : 0;

        $peakReading = Reading::with([
            'meter.building',
            'meter.resourceType',
        ])
        ->orderByDesc(
            'reading_value'
        )
        ->first();

        return view(
            'statistics',
            [

                'campuses' =>
                    Campus::all(),

                'waterLabels' =>
                    $waterStats->pluck('date'),

                'waterData' =>
                    $waterStats->pluck('total'),

                'electricData' =>
                    $electricStats->pluck('total'),

                'wasteData' =>
                    $wasteStats->pluck('total'),

                'topConsumer' =>
                    $topConsumer,
                
                'currentMonthUsage' =>
                    $currentMonthUsage,

                'previousMonthUsage' =>
                    $previousMonthUsage,

                'monthlyPercentage' =>
                    $monthlyPercentage,

                'peakReading' =>
                    $peakReading,
            ]
        );
    }
}