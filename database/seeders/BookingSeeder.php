<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use Faker\Factory as Faker;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 25) as $index) {
            Booking::create([
                'check_in_date' => $faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                'check_out_date' => $faker->dateTimeBetween('+1 day', '+1 week')->format('Y-m-d'),
                'guests_number' => $faker->numberBetween(1, 4),
                'total_payment' => $faker->randomFloat(2, 100, 2000),
                'confirmed' => $faker->boolean(),
                'room_id' => $faker->numberBetween(1, 5),
                'user_id' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}
