<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test05_RegisterEventCest
{
    public function test(AcceptanceTester $I): void
    {
        $userId = 1; // Możesz dynamicznie pobrać user ID
        $eventId = 1; // Możesz dynamicznie pobrać event ID

        $I->wantTo('register for an event');

        // Log in as a user
        $I->amOnPage('/login');
        $I->fillField('email', 'testuser@example.com'); // Replace with a seeded user email
        $I->fillField('password', 'password'); // Replace with a seeded user password
        $I->click('Login');

        // Go to the event registration page
        $I->amOnPage('/events');
        $I->see('Test Event');

        // Register for the event
        $I->click('Zarejestruj się'); // Button or link to register for the event
        $I->see('Rejestracja zakończona sukcesem.');

        // Verify the registration in the database
        $I->seeInDatabase('reservations', [
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);
    }
}
