<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\StudentCourseApply;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<StudentCourseApply>
 */
class StudentCourseApplyFactory extends Factory
{

    protected $model = StudentCourseApply::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 2),
            'course_id' => $this->faker->numberBetween(1, 2),
            'state' => 'applied',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
