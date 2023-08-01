<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
$faker =  Faker::create('id_EN');


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker =  Faker::create('id_EN');

        for($i = 0; $i < 10; $i++) {
            User::create([
                'gender' => $faker->randomElement(['M', 'F']),
                'hobby' => $faker->randomElement(['Music', 'Sport', 'Art']),
                'username' => $faker->userName(),
                'phone' => $faker->randomNumber(9, true),
                'password' => $faker->password()
            ]);
        };
    }
}
