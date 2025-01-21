<?php

namespace TestsCodeception\Acceptance;

use App\Models\User;
use App\Models\Event;
use TestsCodeception\Support\AcceptanceTester;

class Test02_CancelReservationCest
{
    public function test(AcceptanceTester $I): void
    {
        $user = User::factory()->create(['email' => 'testuser@example.com', 'password' => bcrypt('password')]);
        $event = Event::factory()->create(['name' => 'Test Event']);

        $I->wantTo('Join an event and then cancel the reservation');

        $I->amOnPage('/login');
        $I->fillField('email', $user->email);
        $I->fillField('password', 'password');
        $I->click('Login');

        $I->amOnPage(route('user.register', ['eventId' => $event->id]));
        $I->seeInDatabase('reservations', [
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        $I->amOnPage('/events/my-events');
        $I->see($event->name);

        $I->click('Anuluj rezerwację');

        $I->dontSeeInDatabase('reservations', [
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
