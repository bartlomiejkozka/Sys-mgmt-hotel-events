<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_access_dashboard(): void
    {
        $user = User::factory()->create([
            "name" => "Admin0",
        ]);
        $user = User::factory()->create([
            "name" => "Admin1",
        ]);
        $user = User::factory()->create([
            "name" => "Admin2",
        ]);

        $response = $this
            ->actingAs($user)
            ->get(route('admin.dashboard'));

        $response->assertOk();
    }

    public function test_admin_access_event_list(): void
    {
        $user = User::factory()->create([
            "name" => "Admin0",
        ]);
        $user = User::factory()->create([
            "name" => "Admin1",
        ]);
        $user = User::factory()->create([
            "name" => "Admin2",
        ]);

        $response = $this
            ->actingAs($user)
            ->get(route('admin.event.list'));

        $response->assertOk();
    }


    public function test_admin_access_event_create(): void
    {
        $user = User::factory()->create([
            "name" => "Admin0",
        ]);
        $user = User::factory()->create([
            "name" => "Admin1",
        ]);
        $user = User::factory()->create([
            "name" => "Admin2",
        ]);

        $response = $this
            ->actingAs($user)
            ->get(route('admin.event.crete'));

        $response->assertOk();
    }

    public function test_admin_access_notification(): void
    {
        $user = User::factory()->create([
            "name" => "Admin0",
        ]);
        $user = User::factory()->create([
            "name" => "Admin1",
        ]);
        $user = User::factory()->create([
            "name" => "Admin2",
        ]);

        $response = $this
            ->actingAs($user)
            ->get(route('admin.notification'));

        $response->assertOk();
    }

    public function test_admin_access_reports(): void
    {
        $user = User::factory()->create([

            "name" => "Admin0",
        ]);
        $user = User::factory()->create([
            "name" => "Admin1",
        ]);
        $user = User::factory()->create([
            "name" => "Admin2",
        ]);

        $response = $this
            ->actingAs($user)
            ->get(route('admin.reports'));

        $response->assertOk();
    }
}
