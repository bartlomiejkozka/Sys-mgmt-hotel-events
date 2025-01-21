<?php

namespace TestsCodeception\Acceptance;

use App\Models\Review;
use App\Models\User;
use App\Models\Event;
use TestsCodeception\Support\AcceptanceTester;

class Test00_ModelReviewCest
{
    public function test(AcceptanceTester $I): void
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $review = Review::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'content' => 'Great event!',
        ]);
    }

}
