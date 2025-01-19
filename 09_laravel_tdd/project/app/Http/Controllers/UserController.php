<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\WaitingList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    // Wyświetlenie wszystkich dostępnych wydarzeń
    public function events(): View
    {
        $events = Event::where('event_date', '>=', now())->get(); // Pobieranie nadchodzących wydarzeń
        return view('events', compact('events'));
    }

    public function form(): View
    {
        $events = Event::where('event_date', '>=', now())->get(); // Pobieranie nadchodzących wydarzeń
        return view('form', compact('events'));
    }

    // Rejestracja na wydarzenie
    public function register(Request $request): JsonResponse
    {
        // Sprawdzamy, czy użytkownik jest zalogowany
        if (!Auth::check()) {
            return response()->json(['message' => 'Musisz być zalogowany, aby zarejestrować się na wydarzenie.'], 401);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'event_id' => 'required|exists:events,id',  // walidacja event_id
        ]);

        // Sprawdzenie, czy wydarzenie istnieje
        $event = Event::find($validated['event_id']);
        if (!$event) {
            return response()->json(['event_id' => 'Event not found.'], 404);
        }

        // Zapisanie użytkownika na wydarzenie
        Reservation::create([
            'user_id' => Auth::id(),  // Pobieranie ID zalogowanego użytkownika
            'event_id' => $validated['event_id'],
        ]);

        return response()->json(['message' => 'Zarejestrowano na wydarzenie!'], 200);
    }


    // Anulowanie rezerwacji
    public function cancel(int $eventId): JsonResponse
    {
        $event = Event::findOrFail($eventId);
        $reservation = Reservation::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($reservation) {
            $reservation->delete();
            return response()->json(['message' => 'Rezerwacja została anulowana.'], 200);
        }

        return response()->json(['message' => 'Nie masz rezerwacji na to wydarzenie.'], 404);
    }


    // Wyświetlanie zapisanych wydarzeń
    public function myEvents(): View
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->join('events', 'reservations.event_id', '=', 'events.id') // Łączy tabelę 'reservations' z tabelą 'events'
            ->get();
        return view('myevents', compact('reservations'));
    }

    // Wyświetlanie wydarzeń, na które użytkownik jest zapisany
    public function waitingList(): View
    {
        $waitingList = WaitingList::where('user_id', Auth::id())->get();
        return view('user.events.waiting-list', compact('waitingList'));
    }

    public function store(Request $request): JsonResponse
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
        return response()->json(['message' => 'Rejestracja przebiegła pomyślnie!'], 200);
    }

}
