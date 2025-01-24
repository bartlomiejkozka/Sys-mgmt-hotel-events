<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test06_EventsAdminCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Test Events Admin');

        $I->amOnPage('admin/events');

        $I->seeCurrentUrlEquals('/login');

        $I->logInAdmin();

        $I->see('Wszystkie wydarzenia');

        $I->amOnPage('/admin');

        $I->waitForNextPage(fn () => $I->click('Utwórz nowe wydarzenie'));

        $I->seeCurrentUrlEquals('/admin/events/create');

        $I->wantTo('Create a Event');

        $I->see('Utwórz nowe wydarzenie');

        $I->fillField('name', 'Test Event');
        $I->fillField('description', 'Test Event description');
        $I->fillField('location', 'Test Event location');
        $I->fillField('event_date', '10/03/2025');
        $I->fillField('event_time', '10:00am');
        $I->fillField('max_participants', '10');

        $I->waitForNextPage(fn () => $I->click('Zapisz wydarzenie'));

        /** @var string $id */
        $id = $I->grabFromDatabase('events', 'id', [
            'name' => 'Test Event'
        ]);

        $I->seeCurrentUrlEquals('/admin/events/' . $id);

        $I->see('Test Event');

        $I->see('Test Event description');

        $I->seeInDatabase('events', [
            'name' => 'Test Event',
            'description' => 'Test Event description',
            'location' => 'Test Event location',
            'event_date' => '2025-10-03',
            'event_time' => '10:00:00',
            'max_participants' => '10'
        ]);

        $I->wantTo('Update an Event');

        $I->amOnPage('/admin/events/' . $id);

        $I->waitForNextPage(fn () => $I->click('Edytuj wydarzenie'));

        $I->seeCurrentUrlEquals('/admin/events/' . $id . '/edit');
        $I->see('Edytuj wydarzenie');


        $I->fillField('name', 'Test Event NEW');
        $I->fillField('description', 'Test Event description NEW');

        $I->waitForNextPage(fn () => $I->click('Zapisz wydarzenie'));

        $I->seeCurrentUrlEquals('/admin/events/' . $id);

        $I->dontseeInDatabase('events', [
            'name' => 'Test Event',
            'description' => 'Test Event description',
            'location' => 'Test Event location',
            'event_date' => '2025-10-03',
            'event_time' => '10:00:00',
            'max_participants' => '10'
        ]);

        $I->seeInDatabase('events', [
            'name' => 'Test Event NEW',
            'description' => 'Test Event description NEW',
            'location' => 'Test Event location',
            'event_date' => '2025-10-03',
            'event_time' => '10:00:00',
            'max_participants' => '10'
        ]);

        $I->wantTo('Delete an Event');

        $I->amOnPage('/admin/events/' . $id);

        $I->click('Usuń wydarzenie');

        $I->acceptPopup();

        $I->seeCurrentUrlEquals('/admin/events');

        $I->dontSeeInDatabase('events', [
            'name' => 'Test Event NEW',
            'description' => 'Test Event description NEW',
            'location' => 'Test Event location',
            'event_date' => '2025-10-03',
            'event_time' => '10:00:00',
            'max_participants' => '10'
        ]);
    }
}
