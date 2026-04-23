<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoryLog;

class HistoryController extends Controller
{
    public function index()
    {
        return response()->json(HistoryLog::latest()->get());
    }
}