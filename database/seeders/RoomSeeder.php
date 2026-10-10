<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Room;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Recupera gli ID reali degli hotel creati in precedenza.
        $hotelIds = Hotel::pluck('id')->all();

        if (empty($hotelIds)) {
            throw new \RuntimeException(
                'Esegui HotelSeeder prima di RoomSeeder.'
            );
        }

        foreach (range(1, 50) as $index) {
            Room::create([
                'room_number' => $faker->unique()->numberBetween(100, 999),
                'room_type' => $faker->randomElement([
                    'Single',
                    'Double',
                    'Suite',
                ]),
                'price_per_night' => $faker->randomFloat(2, 50, 500),
                'available' => $faker->boolean(),
                'hotel_id' => $faker->randomElement($hotelIds),
            ]);
        }
    }
}