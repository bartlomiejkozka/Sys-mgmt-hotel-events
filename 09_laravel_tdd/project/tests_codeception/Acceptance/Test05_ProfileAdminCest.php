<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;
class Test05_ProfileAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test Profile Admin Page');

        $I->amOnPage('admin/profile');

        $I->logInAdmin();

        $I->seeCurrentUrlEquals('/admin/profile');

        $I->see("Profile Information");

        $I->see("Name");
        $I->see("Admin");

        $I->see("Email");
        //$I->see("admin123@gmail.com");


        //========================================================

        $I->wantTo("Check if Admin name and email are editable");

//        $I->fillField('name', 'test');
//        $I->dontSeeInField('name', 'test');
//
//        $I->fillField('email', 'test@test.com');
//        $I->dontSeeInField('email', 'test@test.com');

        $I->see("Update Password");
        $I->see("Current Password", "label");

        //========================================================


        $I->wantTo("Change the Admin user password");

        $I->see("Update Password");

        $I->fillField('current_password', 'secretAdmin');
        $I->fillField('password', 'test12345');
        $I->fillField('password_confirmation', 'test12345');
        $I->waitForNextPage(fn () => $I->click('Save'));

        $I->seeCurrentUrlEquals('/admin/profile');

        $I->see('Profile');

//        $name = auth()->user()->name;
//        $email = auth()->user()->email;
//        $password = "$2y$12\$ThH.wm8z6n4rOsaQO7SZ/e8FgohjLe.gNhw/IrjhpZ9lopbUu9zjS";
//
//        $I->seeInDatabase('users', [
//            'name' => $name,
//            'email' => $email,
//            'password' => $password
//        ]);

        $I->wantTo('Check if there are possibility to delete Admin account');

        $I->dontSee('Delete Account');
    }
}
