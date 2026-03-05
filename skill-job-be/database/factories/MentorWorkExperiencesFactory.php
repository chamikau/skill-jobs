<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\MentorWorkExperiences;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MentorWorkExperiences>
 */
class MentorWorkExperiencesFactory extends Factory
{

    protected $model = MentorWorkExperiences::class;

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
            'work_experience_job_role_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->name(),
            'start_date' => $this->faker->numerify(),
            'end_date'  => $this->faker->numerify(),
            'description' => $this->faker->text(),
        ];
    }

}
