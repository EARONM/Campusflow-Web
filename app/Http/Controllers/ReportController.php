<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Models\Campus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view(
            'reports',
            [
                'campuses' =>
                    Campus::all(),
            ]
        );
    }

    public function exportCsv(
        Request $request
    )
    {
        $campusId =
            $request->campus;

        $from =
            $request->from;

        $to =
            $request->to;

        $query = Reading::with([
            'meter.building.campus',
            'meter.resourceType',
        ]);

        // campus filter
        if ($campusId) {

            $query->whereHas(
                'meter.building',
                function ($q) use ($campusId) {

                    $q->where(
                        'campus_id',
                        $campusId
                    );
                }
            );
        }

        // date range
        if ($from && $to) {

            $query->whereBetween(
                'created_at',
                [
                    $from,
                    $to
                ]
            );
        }

        $readings =
            $query->latest()->get();

        $filename =
            'campusflow-report-' .
            now()->format(
                'Y-m-d-His'
            ) .
            '.csv';

        $headers = [

            'Content-Type' =>
                'text/csv',

            'Content-Disposition' =>
                'attachment; filename="' .
                $filename .
                '"',
        ];

        $callback =
            function () use ($readings) {

                $file =
                    fopen(
                        'php://output',
                        'w'
                    );

                // header row
                fputcsv($file, [

                    'Campus',
                    'Building',
                    'Resource Type',
                    'Meter Code',
                    'Reading',
                    'Date',
                ]);

                // data
                foreach (
                    $readings
                    as $reading
                ) {

                    fputcsv($file, [

                        $reading
                            ->meter
                            ?->building
                            ?->campus
                            ?->name,

                        $reading
                            ->meter
                            ?->building
                            ?->name,

                        $reading
                            ->meter
                            ?->resourceType
                            ?->name,

                        $reading
                            ->meter
                            ?->meter_code,

                        $reading
                            ->reading_value,

                        $reading
                            ->created_at,
                    ]);
                }

                fclose($file);
            };

        return response()->stream(
            $callback,
            200,
            $headers
        );
    }

    public function exportPdf(
        Request $request
    )
    {
        $query = Reading::with([
            'meter.building.campus',
            'meter.resourceType',
        ]);

        $readings =
            $query->latest()->get();

        $pdf = Pdf::loadView(
            'reports.pdf',
            [
                'readings' => $readings
            ]
        );

        return $pdf->download(
            'campusflow-report.pdf'
        );
    }

}