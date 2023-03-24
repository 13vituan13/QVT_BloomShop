<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VipMember;
class VIPSeeder extends Seeder
{
    public function run()
    {
        $data = [
                    'Silver' => 5, //#8a939b
                    'Gold' => 10,//#cbac0a
                    'Platinum' => 20,//#148895
                    'Diamond'  => 30 //#2901a3
                ];

        foreach($data as $key => $value){
            VipMember::insert([
                'name' => $key,
                'offer' => $value,
            ]);
        }
    }
}

