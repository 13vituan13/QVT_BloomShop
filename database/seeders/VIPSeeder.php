<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class VIPSeeder extends Seeder
{
    public function run()
    {
        $data = [
                    'silver' => 5,
                    'gold' => 10,
                    'platinum' => 20,
                    'diamond'  => 30
                ];

        foreach($data as $key => $value){
            DB::table('vip_member')->insert([
                'name' => $key,
                'offer' => $value,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

