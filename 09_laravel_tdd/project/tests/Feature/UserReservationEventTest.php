<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

class UserReservationEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_reservation_for_an_event(): void
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);

        $this->assertEquals($user->id, $reservation->user->id);
        $this->assertEquals($event->id, $reservation->event->id);
    }

    public function test_an_event_can_have_multiple_reservations()
    {
        $event = Event::factory()->create();
        $users = User::factory()->count(3)->create();

        foreach ($users as $user) {
            Reservation::factory()->create([
                'user_id' => $user->id,
                'event_id' => $event->id,
            ]);
        }

        $this->assertCount(3, $event->reservations);

        foreach ($users as $user) {
            $this->assertDatabaseHas('reservations', [
                'user_id' => $user->id,
                'event_id' => $event->id,
            ]);
        }
    }

    public function test_a_user_can_have_multiple_reservations()
    {
        // Create a user and multiple events
        $user = User::factory()->create();
        $events = Event::factory()->count(3)->create();

        foreach ($events as $event) {
            Reservation::factory()->create([
                'user_id' => $user->id,
                'event_id' => $event->id,
            ]);
        }

        $this->assertCount(3, $user->reservations);

        foreach ($events as $event) {
            $this->assertDatabaseHas('reservations', [
                'user_id' => $user->id,
                'event_id' => $event->id,
            ]);
        }
    }
}
