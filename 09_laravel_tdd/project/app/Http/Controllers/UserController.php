<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\WaitingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->join('events', 'reservations.event_id', '=', 'events.id') // Łączy tabelę 'reservations' z tabelą 'events'
            ->get();
        return view('myevents', compact('reservations'));
    }

    // Wyświetlenie wszystkich dostępnych wydarzeń
    public function events()
    {
        $events = Event::where('event_date', '>=', now())->get(); // Pobieranie nadchodzących wydarzeń
        return view('events', compact('events'));
    }


    public function form()
    {
        $events = Event::where('event_date', '>=', now())->get(); // Pobieranie nadchodzących wydarzeń
        return view('form', compact('events'));
    }



    // Rejestracja na wydarzenie
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

    public function addReview(Request $request)
    {
        // Walidacja danych formularza
        $validated = $request->validate([
            'comment' => 'required|string|max:255',
            'event_id' => 'required|exists:events,id',  // Sprawdzamy, czy event istnieje
            'rating' => 'required|integer|between:1,5', // Rating powinien być w zakresie 1-5
        ]);

        // Zapisujemy opinię
        Review::create([
            'user_id' => Auth::id(),  // Pobieramy ID zalogowanego użytkownika
            'event_id' => $validated['event_id'],
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
        ]);

        // Przekierowanie po zapisaniu opinii
        return redirect()->route('opinions')->with('message', 'Opinia została dodana!');
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
        $reservations = Reservation::where('user_id', Auth::id())
            ->join('events', 'reservations.event_id', '=', 'events.id') // Łączy tabelę 'reservations' z tabelą 'events'
            ->get();
        return view('myevents', compact('reservations'));
    }

    public function opinions()
    {
        // Pobieramy wszystkie nadchodzące wydarzenia
        $events = Event::where('event_date', '>=', now())->get();

        // Pobieramy wszystkie opinie przypisane do zalogowanego użytkownika
        $reviews = Review::all();

        // Przekazujemy wydarzenia i opinie do widoku
        return view('opinions', compact('events', 'reviews'));
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
