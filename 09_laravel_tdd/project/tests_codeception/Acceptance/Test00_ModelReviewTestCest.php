<?php

namespace TestsCodeception\Acceptance;

use App\Models\Review;
use App\Models\User;
use App\Models\Event;
use TestsCodeception\Support\AcceptanceTester;

class Test00_ModelReviewTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure that a review can be created and saved to the database');

        $user = User::factory()->create();
        $event = Event::factory()->create();

        $review = Review::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'comment' => 'Great event!',
            'rating' => 5,
        ]);

        $I->seeInDatabase('reviews', [
            'user_id' => $user->id,
            'event_id' => $event->id,
            'comment' => 'Great event!',
            'rating' => 5,
        ]);
    }
}
