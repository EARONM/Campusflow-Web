<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Reading;

use Illuminate\Support\Facades\Storage;

class GenerateDailyReports
extends Command
{
    protected $signature =
        'reports:daily';

    protected $description =
        'Generate daily PDF reports';

    public function handle()
    {
        $readings = Reading::with([
            'meter.building.campus',
            'meter.resourceType',
        ])->latest()->get();

        $pdf = Pdf::loadView(
            'reports.pdf',
            [
                'readings' => $readings
            ]
        );

        $filename =

            'daily-report-' .

            now()->format(
                'Y-m-d-H-i-s'
            ) .

            '.pdf';

        Storage::put(

            'public/reports/' .

            $filename,

            $pdf->output()
        );

        $this->info(
            'Daily report generated.'
        );
    }
}