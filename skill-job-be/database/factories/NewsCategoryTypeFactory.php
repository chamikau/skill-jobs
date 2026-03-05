<?php

namespace Database\Factories;

use App\Models\NewsCategoryType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NewsCategoryType>
 */
class NewsCategoryTypeFactory extends Factory
{

    protected $model = NewsCategoryType::class;

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
