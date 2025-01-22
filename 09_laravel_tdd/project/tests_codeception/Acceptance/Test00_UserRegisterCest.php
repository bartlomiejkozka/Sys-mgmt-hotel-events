<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_UserRegisterCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('register a new user on the website');

        // Go to the registration page
        $I->amOnPage('/register');
        // Fill in the registration form
        $I->fillField('name', 'Test User');
        $I->fillField('email', 'newuser@example.com');
        $I->fillField('password', 'securepassword');
        $I->fillField('password_confirmation', 'securepassword');

        // Submit the form
        $I->click('Register');

        // Check for success message
        $I->see('Rejestracja zakończona sukcesem.');

        // Verify the new user in the database
        $I->seeInDatabase('users', [
            'email' => 'newuser@example.com',
            'name' => 'Test User',
        ]);
    }

}
