<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test02_CancelReservationCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('cancel from registered event');

        $I->amOnPage('/register');
        $I->fillField('name', 'cancel User');
        $I->fillField('email', 'canceluser@example.com');
        $I->fillField('password', '12345678');
        $I->fillField('password_confirmation', '12345678');
        $I->click('Register');
        $I->click('Log Out');

        $I->amOnPage('/login');

        $I->fillField('email', 'registeruser@example.com');
        $I->fillField('password', '123456789');
        $I->click('Log in');
        $I->amOnPage('/form');

        $I->fillField('Jane', 'cancel User');
        $I->fillField('Doe', 'cancel');
        $I->fillField('joedoe@example.com', 'canceluser@example.com');
        $I->selectOption('select[name="event_id"]', 'Music Festival 2025');
        $I->click('Zapisz się');

        $I->amOnPage('/myevents');
        $I->see('Music Festival 2025');
        $I->click('Cancel');
        $I->cantSee('Music Festival 2025');
    }
}
