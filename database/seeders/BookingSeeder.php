<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Faker\Factory as Faker;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Recupera gli ID effettivi di utenti e camere.
        $userIds = User::pluck('id')->all();
        $roomIds = Room::pluck('id')->all();

        if (empty($userIds) || empty($roomIds)) {
            throw new \RuntimeException(
                'Esegui prima UsersTableSeeder, HotelSeeder e RoomSeeder.'
            );
        }

        foreach (range(1, 25) as $index) {
            // Il check-out deve avvenire dopo il check-in.
            $checkIn = $faker->dateTimeBetween('-1 month', '+1 month');
            $checkOut = (clone $checkIn)->modify(
                '+' . $faker->numberBetween(1, 7) . ' days'
            );

            Booking::create([
                'check_in_date' => $checkIn->format('Y-m-d'),
                'check_out_date' => $checkOut->format('Y-m-d'),
                'guests_number' => $faker->numberBetween(1, 4),
                'total_payment' => $faker->randomFloat(2, 100, 2000),
                'confirmed' => $faker->boolean(),
                'room_id' => $faker->randomElement($roomIds),
                'user_id' => $faker->randomElement($userIds),
            ]);
        }
    }
}