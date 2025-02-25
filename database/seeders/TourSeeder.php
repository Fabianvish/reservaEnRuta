<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::create([
            'date' => '2025-03-01',
            'destination_id' => 1,
            'chauffeur_salary' => 100000,
            'tour_guide_salary' => 90000,
            'vehicle_id' => 1,
            'status' => 1,
        ]);
    }
}
