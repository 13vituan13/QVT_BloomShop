<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusOrder;

class StatusOrderSeeder extends Seeder
{
    public function run()
    {
        $status = ['hoàn tất','chưa giao','đã hủy'];
        foreach ($status as $name) {
            StatusOrder::insert([
                'name' => $name,
            ]);
        }
    }
}

