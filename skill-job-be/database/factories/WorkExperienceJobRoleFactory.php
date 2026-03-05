<?php

namespace Database\Factories;

use App\Models\WorkExperienceJobRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WorkExperienceJobRole>
 */
class WorkExperienceJobRoleFactory extends Factory
{

    protected $model = WorkExperienceJobRole::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }

}
