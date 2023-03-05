<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            Product::insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->numberBetween(10000, 100000),
                'Inventory_number' => $faker->numberBetween(1, 100),
                'category_id' => rand(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

