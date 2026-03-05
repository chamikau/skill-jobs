<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Content;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Content>
 */
class ContentFactory extends Factory
{

    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'course_id' => $this->faker->numberBetween(1, 2),
            'content_name' => $this->faker->name(),
            'number_of_lectures' => $this->faker->numerify(),
            'lecture_hours' => $this->faker->numerify(),
            'content_description' => $this->faker->text()
        ];
    }

}
