<?php

namespace TestsCodeception\Acceptance;

use Illuminate\Support\Facades\Schema;
use TestsCodeception\Support\AcceptanceTester;

class Test03_DatabaseWaitingListTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure the waiting_list table exists and has correct structure');

        $I->assertTrue(Schema::hasTable('waiting_list'), 'Table waiting_list does not exist');
        $I->assertTrue(Schema::hasColumn('waiting_list', 'id'), 'Column id is missing in waiting_list');
        $I->assertTrue(Schema::hasColumn('waiting_list', 'user_id'), 'Column user_id is missing in waiting_list');
        $I->assertTrue(Schema::hasColumn('waiting_list', 'event_id'), 'Column event_id is missing in waiting_list');
        $I->assertTrue(Schema::hasColumn('waiting_list', 'created_at'), 'Column created_at is missing in waiting_list');
        $I->assertTrue(Schema::hasColumn('waiting_list', 'updated_at'), 'Column updated_at is missing in waiting_list');
    }
}
