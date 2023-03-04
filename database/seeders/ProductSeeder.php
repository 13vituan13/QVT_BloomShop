<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('product')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->numberBetween(10000, 100000),
                'image' => $faker->imageUrl(640, 480, 'cats'),
                'Inventory_number' => $faker->numberBetween(1, 100),
                'type_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

