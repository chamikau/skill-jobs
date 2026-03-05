<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\MentorEducations;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Session>
 */
class SessionFactory extends Factory
{

    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'session_type_id' => $this->faker->numberBetween(1, 2),
            'mentor_id' => $this->faker->numberBetween(1, 2),
            'fees' => $this->faker->numerify(),
            'available_time' => $this->faker->numerify(),
            'description' => $this->faker->name(),
        ];
    }

}
