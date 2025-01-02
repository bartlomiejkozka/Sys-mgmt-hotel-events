<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
            ->get(route('admin.event.list'));

        $response->assertOk();
    }

    public function test_admin_access_event_list(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get(route('admin.event.list'));

        $response->assertOk();
    }

    public function test_admin_access_event_create(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get(route('admin.event.crete'));

        $response->assertOk();
    }

    public function test_admin_access_notification(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get(route('admin.notification'));

        $response->assertOk();
    }

    public function test_admin_access_reports(): void
    {
        $response = $this
            ->actingAs($this->admin)
            ->get(route('admin.reports'));

        $response->assertOk();
    }

    public function test_user_access_admin_dashboard(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.dashboard'));

        $response->assertNotFound();
    }

    public function test_user_access_admin_event_list(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.event.list'));

        $response->assertNotFound();
    }

    public function test_user_access_admin_event_create(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.event.crete'));

        $response->assertNotFound();
    }

    public function test_user_access_admin_notification(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.notification'));

        $response->assertNotFound();
    }

    public function test_user_access_admin_reports(): void
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('admin.reports'));

        $response->assertNotFound();
    }
}
