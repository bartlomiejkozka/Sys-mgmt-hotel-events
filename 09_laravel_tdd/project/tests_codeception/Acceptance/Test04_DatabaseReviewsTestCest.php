<?php

namespace TestsCodeception\Acceptance;
use Illuminate\Support\Facades\Schema;

use TestsCodeception\Support\AcceptanceTester;

class Test04_DatabaseReviewsTestCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('Ensure the reviews table exists and has correct structure');

        $I->assertTrue(Schema::hasTable('reviews'), 'Table reviews does not exist');
        $I->assertTrue(Schema::hasColumn('reviews', 'id'), 'Column id is missing in reviews');
        $I->assertTrue(Schema::hasColumn('reviews', 'user_id'), 'Column user_id is missing in reviews');
        $I->assertTrue(Schema::hasColumn('reviews', 'event_id'), 'Column event_id is missing in reviews');
        $I->assertTrue(Schema::hasColumn('reviews', 'content'), 'Column content is missing in reviews');
        $I->assertTrue(Schema::hasColumn('reviews', 'rating'), 'Column rating is missing in reviews');
        $I->assertTrue(Schema::hasColumn('reviews', 'created_at'), 'Column created_at is missing in reviews');
        $I->assertTrue(Schema::hasColumn('reviews', 'updated_at'), 'Column updated_at is missing in reviews');
    }
}
