<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;
class Test08_ReportsAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test Reports Admin');

        $I->amOnPage('admin/reports');

        $I->seeCurrentUrlEquals('/login');

        $I->logInAdmin();

        $I->see('Event History', 'h2');

        $I->amOnPage('admin/events');

        $I->waitForNextPage(fn () => $I->click('Create Event'));

        $I->seeCurrentUrlEquals('/admin/events/create');

        $I->fillField('name', 'Past Test Event');
        $I->fillField('description', 'Past Test Event description');
        $I->fillField('location', 'Test Event location');
        $I->fillField('event_date', '10/01/2025');
        $I->fillField('event_time', '10:00');
        $I->fillField('max_participants', '10');

        $I->waitForNextPage(fn () => $I->click('Create'));

        $I->amOnPage('admin/reports');

        $I->see('Past Test Event');

        $I->see('Past Test Event description');
    }
}
