<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        return view('events.index');
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function show(): View
    {
        return view('events.list');
    }
}
