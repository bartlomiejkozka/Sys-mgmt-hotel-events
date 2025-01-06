<?php

namespace TestsCodeception\Acceptance;
use App\Models\WaitingList;
use App\Models\User;
use App\Models\Event;

use TestsCodeception\Support\AcceptanceTester;

class Test01_ModelWaitingListTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure WaitingList model has correct relationships');

        $waitingList = WaitingList::factory()->create();
        $user = $waitingList->user;
        $event = $waitingList->event;

        $I->assertInstanceOf(User::class, $user, 'WaitingList does not have a valid user relationship');
        $I->assertInstanceOf(Event::class, $event, 'WaitingList does not have a valid event relationship');
    }
}
