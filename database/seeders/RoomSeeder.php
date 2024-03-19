<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use Faker\Factory as Faker;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Room::create([
                'room_number' => $faker->unique()->numberBetween(100, 999),
                'room_type' => $faker->randomElement(['Single', 'Double', 'Suite']),
                'price_per_night' => $faker->randomFloat(2, 50, 500),
                'available' => $faker->boolean(),
                'hotel_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
