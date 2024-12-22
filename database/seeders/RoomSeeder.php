<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Building::factory()
            ->count(5)
            ->has(Room::factory()->count(10), 'rooms') // Ensure `rooms` relation exists in Building model
            ->create();
    }
}
