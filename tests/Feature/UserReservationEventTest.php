<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserReservationEventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Assert that the reservations exist in the database.
     *
     * @param array<User|Event> $models
     */
    private function helper(array $models, User|Event $fixedModel): void
    {
        foreach ($models as $model) {
            Reservation::factory()->create([
                'user_id' => $fixedModel instanceof User ? $fixedModel->id : $model->id,
                'event_id' => $fixedModel instanceof Event ? $fixedModel->id : $model->id,
            ]);
        }
    }

    /**
     * Assert that the reservations exist in the database.
     *
     * @param array<User|Event> $models
     */
    private function helper2(array $models, User|Event $fixedModel): void
    {
        foreach ($models as $model) {
            $this->assertDatabaseHas('reservations', [
                'user_id' => $fixedModel instanceof User ? $fixedModel->id : $model->id,
                'event_id' => $fixedModel instanceof Event ? $fixedModel->id : $model->id,
            ]);
        }
    }
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

        $this->assertNotNull($reservation->user);
        $this->assertNotNull($reservation->event);

        $this->assertEquals($user->id, $reservation->user->id);
        $this->assertEquals($event->id, $reservation->event->id);
    }

    public function test_an_event_can_have_multiple_reservations(): void
    {
        $event = Event::factory()->create();
        $users = User::factory()->count(3)->create();

        $this->helper($users->all(), $event);

        $this->assertCount(3, $event->reservations);

        $this->helper2($users->all(), $event);
    }

    public function test_a_user_can_have_multiple_reservations(): void
    {
        $user = User::factory()->create();
        $events = Event::factory()->count(3)->create();

        $this->helper($events->all(), $user);

        $this->assertCount(3, $user->reservations);

        $this->helper2($events->all(), $user);
    }
}
