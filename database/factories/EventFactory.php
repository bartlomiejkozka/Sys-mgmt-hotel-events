<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'location' => $this->faker->address(),
            'event_date' => $this->faker->date(),
            'event_time' => $this->faker->time(),
            'max_participants' => $this->faker->randomDigit(),
        ];
    }
}
