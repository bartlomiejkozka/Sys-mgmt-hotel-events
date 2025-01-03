<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test02_CancelReservationCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('cancel a reservation');

        // Log in as a user
        $I->amOnPage('/login');
        $I->fillField('email', 'testuser@example.com'); // Replace with a seeded user email
        $I->fillField('password', 'password'); // Replace with a seeded user password
        $I->click('Login');

        // Go to "My Events" page
        $I->amOnPage('/events/my-events');
        $I->see('Test Event');

        // Cancel the reservation
        $I->click('Anuluj rezerwację');
        $I->see('Rezerwacja została anulowana.');

        // Verify the cancellation in the database
        $I->dontSeeInDatabase('reservations', [
            'user_id' => 1, // Replace with the actual user ID
            'event_id' => 1, // Replace with the actual event ID
        ]);
    }
}
