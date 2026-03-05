<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\City;
use App\Models\IndustryType;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class IndustryTypeFactory extends Factory
{

    protected $model = IndustryType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text
        ];
    }
}
