<?php

namespace Database\Factories;

use App\Models\Cafe;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cafe_id' => Cafe::factory(),
            'name' => $this->faker->words(rand(1, 2), true)
        ];
    }
}
