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
        $product1 = [
            'name' => 'Valley Fruits',
            'description' => $faker->sentence,
            'price' => '300',
            'inventory_number' => '100',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product2 = [
            'name' => 'Celebration Time',
            'description' => $faker->sentence,
            'price' => '400',
            'inventory_number' => '80',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product3 = [
            'name' => 'Sweet Candy',
            'description' => $faker->sentence,
            'price' => '500',
            'inventory_number' => '85',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product4 = [
            'name' => 'Sincere Gift',
            'description' => $faker->sentence,
            'price' => '350',
            'inventory_number' => '90',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product5 = [
            'name' => 'Fancy',
            'description' => $faker->sentence,
            'price' => '300',
            'inventory_number' => '80',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product6 = [
            'name' => 'Babe Princess',
            'description' => $faker->sentence,
            'price' => '500',
            'inventory_number' => '70',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product7 = [
            'name' => 'Sweet Day',
            'description' => $faker->sentence,
            'price' => '800',
            'inventory_number' => '60',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product8 = [
            'name' => 'Forever Love',
            'description' => $faker->sentence,
            'price' => '700',
            'inventory_number' => '50',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product9 = [
            'name' => 'Field Of Dreams',
            'description' => $faker->sentence,
            'price' => '1000',
            'inventory_number' => '100',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product10 = [
            'name' => 'Devotion',
            'description' => $faker->sentence,
            'price' => '200',
            'inventory_number' => '100',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        Product::create($product1);
        Product::create($product2);
        Product::create($product3);
        Product::create($product4);
        Product::create($product5);
        Product::create($product6);
        Product::create($product7);
        Product::create($product8);
        Product::create($product9);
        Product::create($product10);
    }
}
