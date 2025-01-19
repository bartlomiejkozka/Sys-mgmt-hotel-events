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
        $I->wantTo('Ensure Review model has correct relationships');

        $review = Review::factory()->create();
        $user = $review->user;
        $event = $review->event;

        $I->assertInstanceOf(User::class, $user, 'Review does not have a valid user relationship');
        $I->assertInstanceOf(Event::class, $event, 'Review does not have a valid event relationship');
    }
}
