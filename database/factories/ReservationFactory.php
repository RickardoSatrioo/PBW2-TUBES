<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('now', '+1 month');
        $endDate = (clone $startDate)->modify('+3 hours'); // Example duration: 3 hours

        return [
            'id_room' => Room::factory(),
            'created_by' => User::factory(),
            'approved_by' => User::factory(),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'purpose' => $this->faker->sentence(),
            'file_proposal' => $this->faker->word() . '.pdf',
            'reason_reject' => $this->faker->optional()->sentence(),
            'duration' => '3 Hours',
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
