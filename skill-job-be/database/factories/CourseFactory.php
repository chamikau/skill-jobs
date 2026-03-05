<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{

    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'course_type_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name(),
            'instructor_name' => $this->faker->name(),
            'instructor_description' => $this->faker->text(),
            'description' => $this->faker->text()
        ];
    }

}
