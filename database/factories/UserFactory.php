<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email'         => fake()->unique()->safeEmail(),
            'wa_number'     => '628' . str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'full_name'     => fake()->name(),
            'password'      => '123123',
            'role'          => 'marketing',
            'confirmed'     => fake()->randomElement([true, false]),
            'suspended'     => fake()->randomElement([true, false]),
            'profile_image' => 'default_profile_img.png'
        ];
    }
  
}
