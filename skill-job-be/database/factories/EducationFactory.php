<?php

namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Education>
 */
class EducationFactory extends Factory
{

    protected $model = Education::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 2),
            'city_id' => $this->faker->numberBetween(1, 2),
            'field_of_study_id' => $this->faker->numberBetween(1, 2),
            'university_name' => $this->faker->name(),
            'course_name' => $this->faker->name(),
            'grade' => $this->faker->name(),
            'start_year' => $this->faker->date(),
            'end_year' => $this->faker->date(),
        ];
    }

}
