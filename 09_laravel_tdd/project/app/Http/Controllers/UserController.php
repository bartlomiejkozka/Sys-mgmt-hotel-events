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
    public function register(Request $request)
    {
        // Walidacja danych
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event_id' => 'required|exists:events,id',  // walidacja event_id
        ]);

        // Znajdź użytkownika po e-mailu lub stwórz nowego
        $user = User::firstOrCreate(
            ['email' => $validated['email']],
            ['name' => $validated['first_name'] . ' ' . $validated['last_name']]
        );

        // Znajdź wydarzenie po ID
        $event = Event::find($validated['event_id']);

        if (!$event) {
            return redirect()->back()->withErrors(['event_name' => 'Event not found.']);
        }

        // Sprawdź, czy wydarzenie jest pełne
        if ($event->isFull()) {
            return redirect()->back()->with('message', 'Event is full. You have been added to the waiting list.');
        }

        // Stwórz rezerwację
        Reservation::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        return redirect()->back()->with('message', 'Successfully registered for the event!');
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

    public function store(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event_name' => 'required|string|max:255',
        ]);

        // Możesz tutaj zapisać dane do bazy danych lub wykonać inne operacje
        // Na przykład:
        // Reservation::create($validatedData);

        // Powrót z komunikatem o sukcesie
        return redirect()->route('form')->with('message', 'Rejestracja przebiegła pomyślnie!');
    }
}

