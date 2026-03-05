<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Factory>
 */
class FeedbackFactory extends Factory
{

    protected $model = Feedback::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomAdminId = Admin::pluck('id')->random();
        return [
            'number_of_rating' => 2,
            'message' => $this->faker->name(),
        ];
    }

}
