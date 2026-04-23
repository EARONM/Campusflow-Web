<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alert;

class AlertController extends Controller
{
    public function index()
    {
        return response()->json(Alert::latest()->get());
    }

    public function markAsRead($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->is_read = true;
        $alert->save();

        return response()->json([
            'message' => 'Alert updated'
        ]);
    }
}