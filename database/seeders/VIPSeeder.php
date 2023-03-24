<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VipMember;
class VIPSeeder extends Seeder
{
    public function run()
    {
        $data = [
                    'Silver' => 5,
                    'Gold' => 10,
                    'Platinum' => 20,
                    'Diamond'  => 30
                ];

        foreach($data as $key => $value){
            VipMember::insert([
                'name' => $key,
                'offer' => $value,
            ]);
        }
    }
}

