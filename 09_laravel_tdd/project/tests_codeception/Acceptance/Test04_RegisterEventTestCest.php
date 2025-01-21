<?php

namespace TestsCodeception\Acceptance;

use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use TestsCodeception\Support\AcceptanceTester;

class Test04_RegisterEventTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure user can register for an event without checking available spots');

        // Tworzymy użytkownika
        $user = User::factory()->create();
        Auth::login($user);

        // Tworzymy wydarzenie
        $event = Event::factory()->create();

        // Test: Zapis na wydarzenie
        $I->amOnPage(route('user.register', ['eventId' => $event->id]));
        $I->see('Zapisano na wydarzenie!'); // Sprawdzamy komunikat o sukcesie
        $I->seeRecord('reservations', [ // Sprawdzamy obecność zapisu w tabeli 'reservations'
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
