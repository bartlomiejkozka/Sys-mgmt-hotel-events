<?php

namespace TestsCodeception\Acceptance;

use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\WaitingList;
use Illuminate\Support\Facades\Auth;
use TestsCodeception\Support\AcceptanceTester;

class Test05_RegisterEventTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure user can register for an event or be added to the waiting list if the event is full');

        // Tworzymy użytkownika
        $user = User::factory()->create();
        Auth::login($user);

        // Tworzymy wydarzenie z wolnymi miejscami
        $eventWithSpace = Event::factory()->create([
            'max_participants' => 10,
        ]);

        // Tworzymy wydarzenie bez wolnych miejsc
        $eventFull = Event::factory()->create([
            'max_participants' => 1,
        ]);

        // Wypełniamy pierwsze wydarzenie, aby było pełne
        Reservation::factory()->create([
            'event_id' => $eventFull->id,
        ]);

        // Test: Zapis na wydarzenie z wolnymi miejscami
        $I->amOnPage(route('user.register', ['eventId' => $eventWithSpace->id]));
        $I->see('Zapisano na wydarzenie!');
        $I->seeRecord(Reservation::class, [
            'user_id' => $user->id,
            'event_id' => $eventWithSpace->id,
            'status' => Reservation::STATUS_CONFIRMED,
        ]);

        // Test: Zapis na listę oczekujących, gdy wydarzenie jest pełne
        $I->amOnPage(route('user.register', ['eventId' => $eventFull->id]));
        $I->see('Zapisano na listę oczekujących!');
        $I->seeRecord(WaitingList::class, [
            'user_id' => $user->id,
            'event_id' => $eventFull->id,
        ]);
    }
}
