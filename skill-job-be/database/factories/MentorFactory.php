<?php

namespace Database\Factories;

use App\Models\Mentor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mentor>
 */
class MentorFactory extends Factory
{

    protected $model = Mentor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name(),
            'position'  => $this->faker->name(),
            'phone_number_1' => $this->faker->phoneNumber(),
            'about_mentor' => $this->faker->text(),
        ];
    }

}
