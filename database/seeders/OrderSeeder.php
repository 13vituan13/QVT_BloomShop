<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            Order::insert([
                'customer_id' => rand(1, 50),
                'date' => $faker->dateTimeBetween('-1 month', 'now'),
                'customer_name' => $faker->name,
                'customer_email' => $faker->email,
                'customer_address' => $faker->address.$faker->city,
                'customer_phone' => $faker->phoneNumber,
                'status_id' => rand(1, 3),
                'total_price_order' => 3000,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

