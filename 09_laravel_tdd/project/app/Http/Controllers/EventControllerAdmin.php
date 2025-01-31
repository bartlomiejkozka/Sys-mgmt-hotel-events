<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventControllerAdmin extends Controller
{
    public function index(): View
    {

        $events = Event::where('event_date', '>=', now())
        ->orderBy('event_date', 'asc')
        ->get();

        return view('events.index')->with('events', $events);
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
        $users = $event->users()->get();

        return view('events.show', [
            'event' => $event,
            'users' => $users,
        ]);
    }

    //AdminOnly
    public function edit(Event $event): View
    {
        echo $event;
        return view('events.edit')->with('event', $event);
    }

    //AdminOnly
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->validated());

        return redirect()->route('events.show', $event);
    }

    //AdminOnly
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('events.index');
    }
}
