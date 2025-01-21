<?php

namespace TestsCodeception\Acceptance;

use App\Models\Event;
use TestsCodeception\Support\AcceptanceTester;

class Test01_EventListTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure the user can see a list of events on the events page');

        $events = Event::factory()->count(3)->create();

        $I->amOnPage('/events');

        foreach ($events as $event) {
            $I->see($event->name);
            $I->see($event->location);
            $I->see($event->event_date);
        }
    }
}
