<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_RegisterEventCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('log in as a registered user');

        $I->amOnPage('/register');
        $I->fillField('name', 'Test User');
        $I->fillField('email', 'newuser@example.com');
        $I->fillField('password', 'securepassword');
        $I->fillField('password_confirmation', 'securepassword');
        $I->click('Register');
        $I->click('Log Out');


        // Go to the login page
        $I->amOnPage('/login');

        // Fill in the login form
        $I->fillField('email', 'newuser@example.com');
        $I->fillField('password', 'securepassword');
        $I->click('Log in');
        $I->amOnPage('/form');

        $I->fillField('name', 'Test User');
        $I->fillField('surname', 'Testowski');
        $I->fillField('email', 'newuser@example.com');
        $I->click('Wybierz wydarzenie');
        $I->click('Music Festival 2025');
        $I->click('Zapisz się');

        $I->amOnPage('/myevents');
        $I->see('Music Festival 2025');

    }
}
