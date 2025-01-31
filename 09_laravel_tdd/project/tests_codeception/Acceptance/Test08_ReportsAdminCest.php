<?php

namespace TestsCodeception\Acceptance;

use App\Models\Event;
use App\Models\Review;
use TestsCodeception\Support\AcceptanceTester;

class Test08_ReportsAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test Reports Admin');

        $I->amOnPage('admin/reports');

        $I->seeCurrentUrlEquals('/login');

        $I->logInAdmin();

        $I->see('Zakończone wydarzenia');

        $I->amOnPage('admin/events/create');

        $I->seeCurrentUrlEquals('/admin/events/create');

        $I->fillField('name', 'Past Test Event');
        $I->fillField('description', 'Past Test Event description');
        $I->fillField('location', 'Test Event location');
        $I->fillField('event_date', '01/01/2025');
        $I->fillField('event_time', '10:00am');
        $I->fillField('max_participants', '10');

        $I->waitForNextPage(fn () => $I->click('Zapisz wydarzenie'));

        $I->amOnPage('admin/reports');

        $I->see('Past Test Event');

        $I->see('Past Test Event description');
    }
}
