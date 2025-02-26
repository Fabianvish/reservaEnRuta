<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'ppu' => 'TEST',
            'make' => 'JAC',
            'model' => 'TEST',
            'consumption' => 20,
            'capacity' => 14
        ]);
    }
}
