<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            ProductImage::insert([
                'product_id' => $i,
                'image' => "images/products/$i/product.png",
            ]);
        }
    }
}
