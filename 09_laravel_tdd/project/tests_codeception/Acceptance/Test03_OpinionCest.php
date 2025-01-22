<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_OpinionCest
{
    public function test(AcceptanceTester $I): void
    {
        $eventId = 1;
        $userId = 1;

        $I->wantTo('leave a review for an event');

        $I->amOnPage('/login');
        $I->fillField('email', 'testuser@example.com');
        $I->fillField('password', 'password');
        $I->click('Login');

        // Go to the event details page
        $I->amOnPage("/opinions");

        // Leave a review for the event
        $I->fillField('review', 'To był niesamowity event!');
        $I->selectOption('rating', '5');
        $I->click('Submit Review');


        $I->seeInDatabase('reviews', [
            'user_id' => $userId,
            'event_id' => $eventId,
            'review' => 'To był niesamowity event!',
            'rating' => 5
        ]);
    }
}
