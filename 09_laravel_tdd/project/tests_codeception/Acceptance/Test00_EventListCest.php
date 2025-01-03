<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_EventListCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see the list of events on the homepage');

        // Go to the events page
        $I->amOnPage('/events');

        // Check page title
        $I->seeInTitle('Events');

        // Check for specific events
        $I->see('Test Event'); // Replace with the name of a seeded event
        $I->see('This is a test event.');
        $I->see('Wolne miejsca: 10');
    }
}
