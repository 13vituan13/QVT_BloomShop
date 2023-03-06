<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $productIds = Product::pluck('product_id')->toArray();
        
        for ($i = 0; $i < 50; $i++) {
            ProductImage::insert([
                'product_id' => $faker->randomElement($productIds),
                'no'    => rand(1, 50),
                'image' => $faker->imageUrl(640, 480, 'cats'),
            ]);
        }
    }
}
