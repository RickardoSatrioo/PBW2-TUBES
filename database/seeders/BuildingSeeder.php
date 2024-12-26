<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buildings = [
            ['name' => 'GSG', 'description' => 'Gedung Serba Guna'],
            ['name' => 'STUDENT CENTER', 'description' => 'Pusat kegiatan mahasiswa'],
            ['name' => 'SPORT CENTER', 'description' => 'Fasilitas olahraga'],
            ['name' => 'MANTERAWU', 'description' => null],
            ['name' => 'GEDUNG DAMAR', 'description' => null],
            ['name' => 'TERAS PRIANGAN', 'description' => 'Area bersantai untuk mahasiswa'],
            ['name' => 'GREEN LOUNGE', 'description' => 'Ruang santai bernuansa hijau'],
            ['name' => 'TULT', 'description' => null],
            ['name' => 'TUCH', 'description' => null],
            ['name' => 'MARATUA', 'description' => 'Gedung pertemuan'],
        ];

        foreach ($buildings as $building) {
            Building::firstOrCreate([
                'name' => $building['name'],
                'description' => $building['description'],
                'status' => true,
            ]);
        }
    }
}
