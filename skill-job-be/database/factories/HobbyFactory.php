<?php

namespace Database\Factories;

use App\Models\CourseType;
use App\Models\Hobby;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Hobby>
 */
class HobbyFactory extends Factory
{

    protected $model = Hobby::class;

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
