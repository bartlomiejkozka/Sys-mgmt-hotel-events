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


    public function form()
    {
        $events = Event::where('event_date', '>=', now())->get(); // Pobieranie nadchodzących wydarzeń
        return view('form', compact('events'));
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
}
