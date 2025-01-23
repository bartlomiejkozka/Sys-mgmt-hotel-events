<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_OpinionCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('give an opinion about selected event');

        $I->amOnPage('/register');
        $I->fillField('name', 'opinion User');
        $I->fillField('email', 'opinionuser@example.com');
        $I->fillField('password', '123456782');
        $I->fillField('password_confirmation', '123456782');
        $I->click('Register');

        $I->amOnPage('/form');
        $I->fillField('Jane', 'Test User');
        $I->fillField('Doe', 'Testowski');
        $I->fillField('joedoe@example.com', 'opinionuser@example.com');
        $I->selectOption('select[name="event_id"]', 'Music Festival 2025');
        $I->click('Zapisz się');

        $I->amOnPage('/opinions');
        $I->fillField('Write a comment...', 'Wooooow');
        $I->selectOption('#event_id', 'Music Festival 2025');
        $I->selectOption('#rating', '5');
        $I->click('button.ms-3');
        $I->see('Rating: 5/5');
    }
}
