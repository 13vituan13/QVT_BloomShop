<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $orderIds = DB::table('order')->pluck('order_id')->toArray();
        $productIds = DB::table('product')->pluck('product_id')->toArray();
        
        for ($i = 0; $i < 20; $i++) {
            DB::table('order_detail')->insert([
                'order_id' => $faker->randomElement($orderIds),
                'product_id' => $faker->randomElement($productIds),
                'number' => rand(1, 10),
                'price' => 300,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
