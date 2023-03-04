<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $banners = ['xuân' => 'image_banner_01.jpg','hạ' => 'image_banner_02.jpg','thu' => 'image_banner_03.jpg', 'đông' => 'image_banner_04.jpg'];
        foreach ($banners as $name => $banner) {
            Banner::insert([
                'name' => $name,
                'image' => $banner,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

