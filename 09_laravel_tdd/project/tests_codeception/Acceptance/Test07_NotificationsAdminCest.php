<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test07_NotificationsAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test Notifications Admin');

        $I->amOnPage('admin/notifications');

        $I->seeCurrentUrlEquals('/login');

        $I->logInAdmin();

        $I->see('Sent Notifications', 'h2');

        $I->waitForNextPage(fn () => $I->click('Create Notification'));

        $I->seeCurrentUrlEquals('/admin/notifications/create');

        $I->wantTo('Create a Notification');

        $I->see('Create Notification', 'h2');

        $I->fillField('title', 'Test Notification');
        $I->fillField('body', 'Test Notification body');

        $I->waitForNextPage(fn () => $I->click('Send'));

        /** @var string $id */
        $id = $I->grabFromDatabase('notifications', 'id', [
            'title' => 'Test Notification'
        ]);

        $I->seeCurrentUrlEquals('/admin/notifications');

        $I->see('Test Notification');

        $I->see('Test Notification body');

        $I->seeInDatabase('notifications', [
            'title' => 'Test Notification',
            'body' => 'Test Notification body'
        ]);

        $I->wantTo('Delete an Notification');

        $I->amOnPage('/admin/notifications/' . $id);

        $I->waitForNextPage(fn () => $I->click('Delete'));

        $I->seeCurrentUrlEquals('/notifications');

        $I->dontseeInDatabase('notifications', [
            'title' => 'Test Notification',
            'body' => 'Test Notification body'
        ]);
    }
}
