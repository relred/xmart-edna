<?php

namespace App\Http\Controllers;

use App\Models\GuardianScan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GuardianScanController extends Controller
{
    public function index(): View
    {
        return view('logs.index', [
            'logs' => GuardianScan::orderBy('created_at', 'desc')->take(250)->get(),
        ]);
    }
}
