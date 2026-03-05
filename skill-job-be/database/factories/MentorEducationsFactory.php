<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\MentorEducations;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MentorEducations>
 */
class MentorEducationsFactory extends Factory
{

    protected $model = MentorEducations::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'mentor_id' => $this->faker->numberBetween(1, 2),
            'city_id' => $this->faker->numberBetween(1, 2),
            'field_of_study_id' => $this->faker->numberBetween(1, 2),
            'university_name' => $this->faker->name(),
            'course_name' => $this->faker->name(),
            'start_year' => $this->faker->name(),
            'end_year' => $this->faker->name(),
        ];
    }

}
