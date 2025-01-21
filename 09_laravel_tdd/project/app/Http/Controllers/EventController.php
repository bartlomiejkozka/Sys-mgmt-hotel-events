<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // Wyświetlanie zapisanych wydarzeń

    public function myEvents()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->join('events', 'reservations.event_id', '=', 'events.id')
            ->select('reservations.*') // Pobiera tylko dane z tabeli 'reservations'
            ->with('event') // Ładuje szczegóły wydarzenia
            ->get();

        return view('myevents', compact('reservations'));
    }

    // Anulowanie rezerwacji
    public function cancel($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($reservation) {
            $reservation->delete();
            return redirect()->back()->with('success', 'Reservation canceled successfully.');
        }

        return redirect()->back()->with('error', 'Reservation not found.');
    }

    public function register(Request $request)
    {
        // Sprawdzenie, czy użytkownik jest zalogowany
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors(['message' => 'Musisz być zalogowany, aby zarejestrować się na wydarzenie.']);
        }

        // Walidacja danych
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $eventId = $validated['event_id'];
        $userId = Auth::id();

        // Sprawdzenie, czy użytkownik już jest zapisany na wydarzenie
        $exists = Reservation::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->exists();

        if ($exists) {
            return redirect()
                ->back()
                ->withErrors(['event_id' => 'Już jesteś zapisany na to wydarzenie.']);
        }

        // Rejestracja na wydarzenie
        Reservation::create([
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);

        return redirect()->route('form')->with('message', 'Zarejestrowano na wydarzenie!');
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
        return redirect()->route('events')->with('message', 'Rejestracja przebiegła pomyślnie!');
    }

    public function events()
    {
        $events = Event::where('event_date', '>=', now())->get(); // Pobieranie nadchodzących wydarzeń
        return view('events', compact('events'));
    }
}
