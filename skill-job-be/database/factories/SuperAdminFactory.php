<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class SuperAdminFactory extends Factory
{

    protected $model = SuperAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail,
            'password' => bcrypt('password123'),
        ];
    }

}
