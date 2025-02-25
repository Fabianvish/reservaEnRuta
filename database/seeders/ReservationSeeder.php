<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Reservation;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $tour = Tour::first();
        $prefix = $tour->destination->prefix;
        $tour = $tour->id;
        Reservation::create([
            'reservation_code' => $prefix . $tour . 1,
            'tour_id' => 1,
            'passenger_id' => 1,
            'status' => 0,
            'payment_method' => "EFECTIVO",
            'currency' => 60000,
            'children_count' => 0,
            'adult_count' => 1,
            'third_age_count' => 0,
        ]);
    }
}
