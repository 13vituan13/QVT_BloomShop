<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $status = ['Đang bán','Hết hàng'];
        foreach ($status as $name) {
            Status::insert([
                'name' => $name,
            ]);
        }
    }
}

