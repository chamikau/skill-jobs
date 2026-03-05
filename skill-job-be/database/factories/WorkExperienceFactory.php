<?php

namespace Database\Factories;

use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkExperience>
 */
class WorkExperienceFactory extends Factory
{

    protected $model = WorkExperience::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 2),
            'work_experience_job_role_id' => $this->faker->numberBetween(1, 2),
            'company_name' => $this->faker->name(),
            'name' => $this->faker->name(),
            'duration' => $this->faker->numerify(),
            'description' => $this->faker->name(),
        ];
    }

}
