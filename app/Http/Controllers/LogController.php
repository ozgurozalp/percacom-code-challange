<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogController extends Controller
{
    public function __invoke()
    {
        $logs = Log::orderBy('id', 'desc')->get();
        return view('logs', compact('logs'));
    }
}
