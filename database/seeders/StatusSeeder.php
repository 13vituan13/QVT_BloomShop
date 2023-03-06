<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $status = ['đang bán','hết hàng'];
        foreach ($status as $name) {
            Status::insert([
                'name' => $name,
            ]);
        }
    }
}

