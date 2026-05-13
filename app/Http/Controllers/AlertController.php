<?php

namespace App\Http\Controllers;

use App\Models\Alert;

class AlertController extends Controller
{
    public function resolve(Alert $alert)
    {
        $alert->update([

            'status' => 'resolved',

            'is_read' => true,
        ]);

        return back()->with(
            'success',
            'Alert resolved.'
        );
    }

    public function markAsRead(Alert $alert)
    {
        $alert->update([
            'is_read' => true,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

}