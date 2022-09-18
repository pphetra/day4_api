<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyUser>
 */
class MyUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->userName,
            'is_active' => $this->faker->boolean,
            'province_code' => $this->faker->randomNumber(2),
            'district_code' => $this->faker->randomNumber(4),
            'subdistrict_code' => $this->faker->randomNumber(6),
        ];
    }
}
