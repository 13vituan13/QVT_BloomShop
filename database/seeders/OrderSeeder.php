<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            DB::table('order')->insert([
                'customer_id' => rand(1, 50),
                'date' => $faker->dateTimeBetween('-1 month', 'now'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

