<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        return view('events.index')->with('events', Event::all());
    }

    //AdminOnly
    public function create(): View
    {
        return view('events.create');
    }

    //AdminOnly
    public function store(StoreEventRequest $request): RedirectResponse
    {
        $event = Event::create($request->validated());

        return redirect()->route('events.show', $event);
    }

    public function show(Event $event): View
    {
        return view('events.show')->with('event', $event);
    }

    //AdminOnly
    public function edit(Event $event): View
    {
        return view('events.edit')->with('event', $event);
    }

    //AdminOnly
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->validated());

        return redirect()->route('books.show', $event);
    }

    //AdminOnly
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
