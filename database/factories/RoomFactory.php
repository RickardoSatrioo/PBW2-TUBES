<?php

namespace Database\Factories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_building' => Building::factory(),
            'name' => 'Room ' . $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(640, 480, 'room', true),
            'capacity' => $this->faker->numberBetween(10, 200),
            'open' => $this->faker->time('H:i:s'),
            'close' => $this->faker->time('H:i:s'),
            'contact_person' => $this->faker->phoneNumber(),
        ];
    }
}
