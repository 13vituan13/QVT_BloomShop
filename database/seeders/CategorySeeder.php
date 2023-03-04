<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categorys = ['Hoa Bó','Bình Hoa','Hộp Hoa', 'Giỏ Hoa', 'Kệ Hoa', 'Hoa Ăn Được', 'Hoa Cưới', 'Hoa Tết', 'Bánh Kem'];

        foreach ($categorys as $category) {
            DB::table('category')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

