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

    public function a_user_can_create_a_reservation_for_an_event(): void
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
}
