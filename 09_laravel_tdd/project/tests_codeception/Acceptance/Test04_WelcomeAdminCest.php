<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_WelcomeAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('see the welcome Admin page');

        $I->amOnPage('/admin');

        $I->logInAdmin();

        $I->wantTo('See all text on Admin page');

        $I->see('Welcome Admin', 'h2');

        $I->see('Upcoming Events', 'h3');

        $I->wantTo('Check all buttons');

        $I->waitForNextPage(fn () => $I->click('Create new event'));

        $I->seeCurrentUrlEquals('/admin/events/create');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('See all events'));

        $I->seeCurrentUrlEquals('/admin/events/list');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('Notifications'));

        $I->seeCurrentUrlEquals('/admin/notifications');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('Reports'));

        $I->seeCurrentUrlEquals('/admin/reports');
    }
}
