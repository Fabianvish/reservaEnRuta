<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt(12345678)
        ]);

        $this->call([
            DestinationSeeder::class,
            PassengerSeeder::class,
            VehicleSeeder::class,
            DiscountSeeder::class,
            TourSeeder::class,
            ReservationSeeder::class
        ]);
    }
}
