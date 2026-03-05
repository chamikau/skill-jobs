<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\StudentCourseApply;
use App\Models\StudentEventApply;
use App\Models\StudentHobby;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<StudentHobby>
 */
class StudentHobbiesFactory extends Factory
{

    protected $model = StudentHobby::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 2),
            'hobby_id' => $this->faker->numberBetween(1, 2),
        ];
    }

}
