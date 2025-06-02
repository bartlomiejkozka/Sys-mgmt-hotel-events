<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notifications')->insert([
            'title' => 'Pamiętaj o wykwaterowaniu',
            'body' => 'Przypominamy, że należy się wykwaterować do godziny 10',
            'created_at' => now(),
        ]);
    }
}
