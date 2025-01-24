<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function destroy(User $user, Event $event)
    {
        $reservation = Reservation::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->firstOrFail();

        $reservation->delete();

        return redirect()->route('events.show', $event);
    }
}
