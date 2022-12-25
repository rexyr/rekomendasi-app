<?php

namespace Database\Factories;

use App\Models\Cafe;
use Illuminate\Database\Eloquent\Factories\Factory;

class CapsterFactory extends Factory
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
            'name' => $this->faker->firstNameMale(),
            'age' => rand(20, 40),
            'photo' => 'https://www.seekpng.com/png/detail/428-4287240_no-avatar-user-circle-icon-png.png'
        ];
    }
}
