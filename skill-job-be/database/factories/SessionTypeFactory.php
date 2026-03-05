<?php

namespace Database\Factories;

use App\Models\Session;
use App\Models\SessionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Session>
 */
class SessionTypeFactory extends Factory
{

    protected $model = SessionType::class;

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
