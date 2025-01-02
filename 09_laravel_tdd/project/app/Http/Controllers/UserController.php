<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\WaitingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Wyświetlenie wszystkich dostępnych wydarzeń
    public function index()
    {
        $events = Event::where('event_date', '>=', now())->get();
        return view('user.events.index', compact('events'));
    }

    // Rejestracja na wydarzenie
    public function register($eventId)
    {
        $event = Event::findOrFail($eventId);

        // Sprawdzanie, czy są wolne miejsca
        if ($event->isFull()) {
            // Jeśli wydarzenie jest pełne, zapisz użytkownika na listę oczekujących
            WaitingList::create([
                'user_id' => Auth::id(),
                'event_id' => $event->id
            ]);
            return back()->with('message', 'Zapisano na listę oczekujących!');
        }

        // Zapisz rezerwację
        Reservation::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'status' => Reservation::STATUS_CONFIRMED
        ]);

        return back()->with('message', 'Zapisano na wydarzenie!');
    }

    // Anulowanie rezerwacji
    public function cancel($eventId)
    {
        $event = Event::findOrFail($eventId);
        $reservation = Reservation::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($reservation) {
            $reservation->delete();
            return back()->with('message', 'Rezerwacja została anulowana.');
        }

        return back()->withErrors(['message' => 'Nie masz rezerwacji na to wydarzenie.']);
    }

    // Wyświetlanie zapisanych wydarzeń
    public function myEvents()
    {
        $reservations = Reservation::where('user_id', Auth::id())->get();
        return view('user.events.my-events', compact('reservations'));
    }

    // Wyświetlanie wydarzeń, na które użytkownik jest zapisany
    public function waitingList()
    {
        $waitingList = WaitingList::where('user_id', Auth::id())->get();
        return view('user.events.waiting-list', compact('waitingList'));
    }
}

