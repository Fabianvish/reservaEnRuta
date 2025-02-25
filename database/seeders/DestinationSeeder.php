<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'name' => 'Full Day Torres del Paine',
            'source' => 'General del Canto 01250, Punta Arenas',
            'destination' => 'Reserva Nacional Torres del Paine',
            'prefix' => 'FDTDP',
            'kms' => 340,
            'adult_price' => 60000,
            'children_price' => 40000,
            'third_age_price' => 40000,
            'start' => '05:00',
            'end' => '22:30',

        ]);
    }
}
