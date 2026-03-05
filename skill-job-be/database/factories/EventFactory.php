<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{

    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'event_type_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name(),
            'event_organizer' => $this->faker->name(),
            'date' => $this->faker->date(),
            'location' => $this->faker->name(),
            'description' => $this->faker->text()
        ];
    }

}
