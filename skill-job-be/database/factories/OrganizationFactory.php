<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\City;
use App\Models\IndustryType;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Organization>
 */
class OrganizationFactory extends Factory
{

    protected $model = Organization::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => Admin::firstOrFail()->id,
            'name' => $this->faker->company(),
            'industry_type_id' => IndustryType::firstOrFail()->id,
            'city_id' =>City::firstOrFail()->id,
            'about_the_company'=>$this->faker->text,
//            'social_links'=> 'adfaf',
            'state'=>$this->faker->randomElement(['active','inactive'])

        ];
    }
}
