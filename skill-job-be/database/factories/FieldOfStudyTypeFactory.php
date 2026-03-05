<?php

namespace Database\Factories;


use App\Models\FieldOfStudyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FieldOfStudyType>
 */
class FieldOfStudyTypeFactory extends Factory
{

    protected $model = FieldOfStudyType::class;

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
