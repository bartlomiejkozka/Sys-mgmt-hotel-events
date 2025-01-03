<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test01_EventRegistrationCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('register for an event');

        // Log in as a user
        $I->amOnPage('/login');
        $I->fillField('email', 'testuser@example.com'); // Replace with a seeded user email
        $I->fillField('password', 'password'); // Replace with a seeded user password
        $I->click('Login');

        // Navigate to the events page
        $I->amOnPage('/events');
        $I->see('Test Event');

        // Register for the event
        $I->click('Zapisz się na wydarzenie');
        $I->see('Zapisano na wydarzenie!');

        // Verify in the database
        $I->seeInDatabase('reservations', [
            'user_id' => 1, // Replace with the actual user ID
            'event_id' => 1, // Replace with the actual event ID
            'status' => 'confirmed'
        ]);
    }
}
