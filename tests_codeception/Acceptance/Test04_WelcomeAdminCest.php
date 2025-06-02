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

        $I->see('Panel Administracyjny');

        $I->see('Najbliższe wydarzenia');

        $I->wantTo('Check all buttons');

        $I->waitForNextPage(fn () => $I->click('Utwórz nowe wydarzenie'));

        $I->seeCurrentUrlEquals('/admin/events/create');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('Zobacz wszystkie wydarzenia'));

        $I->seeCurrentUrlEquals('/admin/events');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('Powiadomienia'));

        $I->seeCurrentUrlEquals('/admin/notifications');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('Raporty'));

        $I->seeCurrentUrlEquals('/admin/reports');
    }
}
