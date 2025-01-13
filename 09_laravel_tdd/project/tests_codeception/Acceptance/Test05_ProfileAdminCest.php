<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;
class Test05_ProfileAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test Profile Admin Page');

        $I->amOnPage('/profile');

        $I->logInAdmin();

        $I->seeCurrentUrlEquals('/profile');

        $I->see("Profile Information");

        $I->see("Name");
        $I->see(auth()->user()->name);

        $I->see("Email");
        $I->see(auth()->user()->email);


        //========================================================

        $I->wantTo("Check if Admin name and email are editable");

        $I->fillField('name', 'test');
        $I->dontSeeInField('name', 'test');

        $I->fillField('email', 'test@test.com');
        $I->dontSeeInField('email', 'test@test.com');

        $I->see("Update Password");
        $I->see("Current Password", "label");

        //========================================================


        $I->wantTo("Change the Admin user password");

        $I->see("Update Password");

        $I->fillField('current_password', auth()->user()->getAuthPassword());
        $I->fillField('password', 'test');
        $I->fillField('password_confirmation', 'test');
        $I->waitForNextPage(fn () => $I->click('Save'));

        $I->seeCurrentUrlEquals('/profile');

        $I->seeInDatabase('users', [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'password' => bcrypt('test')
        ]);

        $I->wantTo('Check if there are possibility to delete Admin account');

        $I->see('Delete Account');
    }
}
