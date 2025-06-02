<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            'name' => 'Tech Conference 2025',
            'description' => 'A conference focusing on the latest trends in technology.',
            'location' => 'Conference Center, Cityville',
            'event_date' => '2025-06-15',
            'event_time' => '09:00:00',
            'max_participants' => 500,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('events')->insert([
            'name' => 'Music Festival 2025',
            'description' => 'An outdoor music festival featuring top artists from around the world.',
            'location' => 'Central Park, Metropolis',
            'event_date' => '2025-08-20',
            'event_time' => '15:00:00',
            'max_participants' => 2000,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
