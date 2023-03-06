<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run()
    {
        $banners = [    
                        'banner_1' => 'banner_1.png',
                        'banner_2' => 'banner_2.png',
                        'banner_3' => 'banner_3.png', 
                        'banner_4' => 'banner_4.png',
                        'banner_5' => 'banner_5.png', 
                        'banner_6' => 'banner_6.png'
                    ];
        foreach ($banners as $name => $banner) {
            Banner::insert([
                'name' => $name,
                'image' => $banner,
            ]);
        }
    }
}

