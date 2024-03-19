<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use Faker\Factory as Faker;
class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Hotel::create([
                'name' => $faker->company,
                'address' => $faker->address,
                'city' => $faker->city,
                'country' => $faker->country,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'stars' => $faker->numberBetween(1, 5),
                'description' => $faker->text
            ]);
        }
    }
}
