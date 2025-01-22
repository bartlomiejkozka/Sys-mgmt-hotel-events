<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;
    protected User $admin;
    protected User $user;
    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            "name" => "Admin",
        ]);

        $this->user = User::factory()->create([
            "name" => "User",
        ]);
    }

    public function test_admin_access_dashboard(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get("admin");

        $response->assertOk();
    }

    public function test_admin_access_events(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get("admin/events");

        $response->assertOk();
    }

    public function test_admin_access_event_create(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get("admin/events/create");

        $response->assertOk();
    }

    public function test_admin_access_notification(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get("admin/notifications");

        $response->assertOk();
    }

    public function test_admin_access_reports(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get("admin/reports");

        $response->assertOk();
    }

    public function test_user_access_admin_dashboard(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get("admin");

        $response->assertForbidden();
    }

    public function test_user_access_admin_events(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get("admin/events");

        $response->assertForbidden();
    }

    public function test_user_access_admin_event_create(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get("admin/events/create");

        $response->assertForbidden();
    }

    public function test_user_access_admin_notification(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get("admin/notifications");

        $response->assertForbidden();
    }

    public function test_user_access_admin_reports(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get("admin/reports");

        $response->assertForbidden();
    }
}
