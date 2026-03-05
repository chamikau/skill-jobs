<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{

    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_by' => $this->faker->numberBetween(1, 2),
            'organization_id' => $this->faker->numberBetween(1, 2),
            'city_id' => $this->faker->numberBetween(1, 2),
            'title' => $this->faker->name(),
            'location_type' => $this->faker->name(),
            'number_of_openings' => $this->faker->numerify(),
            'probation_duration'=> $this->faker->numerify(),
            'work_hours'=> $this->faker->numerify(),
            'work_hour_rate'=> $this->faker->numerify(),
            'application'=> $this->faker->text(),
            'description'=> $this->faker->text()
        ];
    }

}
