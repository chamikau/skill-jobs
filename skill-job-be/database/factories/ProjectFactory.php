<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{

    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_id' => $this->faker->numberBetween(1, 2),
            'education_id' => $this->faker->numberBetween(1, 2),
            'project_title' => $this->faker->name(),
            'project_description' => $this->faker->text(),
            'project_links' => $this->faker->url(),
            'skills_used' => $this->faker->text()
        ];
    }

}
