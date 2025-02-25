<?php

namespace Database\Seeders;

use App\Models\Passenger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Passenger::create([
            'name' => 'Fabian Gomez',
            'run' => '18551449-8',
            'email' => 'fgomez.a@outlook.com',
            'residence' => 'Pje Las Aguilas 01456, Punta Arenas',
            'phone' => '+56938700584'
        ]);
    }
}
