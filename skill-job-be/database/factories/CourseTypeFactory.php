<?php

namespace Database\Factories;

use App\Models\CourseType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CourseType>
 */
class CourseTypeFactory extends Factory
{

    protected $model = CourseType::class;

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
