<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('report.index')
            ->with('events', Event::where('event_date', '<', now())
            ->orderBy('event_date', 'desc')
            ->get());
    }

}
