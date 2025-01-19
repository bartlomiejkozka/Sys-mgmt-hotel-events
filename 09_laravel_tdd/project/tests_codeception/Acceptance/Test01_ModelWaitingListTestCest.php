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
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $waitingList = WaitingList::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        $I->assertInstanceOf(WaitingList::class, $waitingList);
        $I->assertEquals($user->id, $waitingList->user_id);
        $I->assertEquals($event->id, $waitingList->event_id);
    }

}
