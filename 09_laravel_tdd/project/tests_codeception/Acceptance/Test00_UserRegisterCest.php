<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test00_UserRegisterCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('register a new user on the website');

        $I->amOnPage('/register');
        $I->fillField('name', 'Test User');
        $I->fillField('email', 'newuser@example.com');
        $I->fillField('password', 'securepassword');
        $I->fillField('password_confirmation', 'securepassword');
        $I->click('Register');
        $I->seeInDatabase('users', [
            'email' => 'newuser@example.com',
            'name' => 'Test User',
        ]);
    }

}
