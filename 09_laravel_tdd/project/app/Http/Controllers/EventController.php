<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
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
        $users = DB::table('reservations')
            ->join('users', 'users.id', '=', 'reservations.user_id')
            ->where('reservations.event_id', $event->id)
            ->select('users.*')
            ->get();

        return view('events.show', [
            'event' => $event,
            'users' => $users,
        ]);
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
