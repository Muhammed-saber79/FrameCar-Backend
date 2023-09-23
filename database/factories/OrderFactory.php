<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phoneNumber' => fake()->phoneNumber(),
            'carType' => fake()->name(),
            'glassType' => fake()->name(),
            'glassPosition' => 'front',
            'brokenGlassImage' => 'broken glass image',
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'locationLink' => fake()->url(),
            'user_id' => 1,
        ];
    }
}
