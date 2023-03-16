<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categorys = ['Hoa Bó','Bình Hoa','Hộp Hoa', 'Giỏ Hoa', 'Kệ Hoa', 'Hoa Ăn Được', 'Hoa Cưới', 'Hoa Tết', 'Bánh Kem'];
        foreach ($categorys as $category) {
            Category::insert([
                'name' => $category,
            ]);
        }
    }
}

