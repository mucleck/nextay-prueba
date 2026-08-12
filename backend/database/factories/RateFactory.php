<?php

namespace Database\Factories;

use App\Models\Rate;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_type_id' => RoomType::factory(),
            'price' => fake()->randomFloat(2, 50, 300),
            'valid_from' => fake()->dateTimeBetween('-3 years', 'now'),
        ];
    }
}
