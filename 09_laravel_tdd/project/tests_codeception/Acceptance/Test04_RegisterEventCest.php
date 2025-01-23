<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_RegisterEventCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('log in as a registered user');

        $I->amOnPage('/register');
        $I->fillField('name', 'register User');
        $I->fillField('email', 'registeruser@example.com');
        $I->fillField('password', '123456789');
        $I->fillField('password_confirmation', '123456789');
        $I->click('Register');
        $I->click('Log Out');


        // Go to the login page
        $I->amOnPage('/login');

        // Fill in the login form
        $I->fillField('email', 'registeruser@example.com');
        $I->fillField('password', '123456789');
        $I->click('Log in');
        $I->amOnPage('/form');

        $I->fillField('Jane', 'Test User');
        $I->fillField('Doe', 'Testowski');
        $I->fillField('joedoe@example.com', 'newuser@example.com');
        $I->selectOption('select[name="event_id"]', 'Music Festival 2025');
        $I->click('Zapisz się');

        $I->amOnPage('/myevents');
        $I->see('Music Festival 2025');

    }
}
