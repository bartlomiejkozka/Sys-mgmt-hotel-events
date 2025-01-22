<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test01_UserLoginCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('log in as a registered user');

        // Go to the login page
        $I->amOnPage('/login');

        // Fill in the login form
        $I->fillField('email', 'newuser@example.com');
        $I->fillField('password', 'securepassword');

        // Submit the form
        $I->click('Login');

        // Check for success message or user dashboard
        $I->see('Nadchodzące wydarzenia');
    }

}
