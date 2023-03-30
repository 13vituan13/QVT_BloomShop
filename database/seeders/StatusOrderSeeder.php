<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusOrder;

class StatusOrderSeeder extends Seeder
{
    public function run()
    {
        $status = ['Chờ duyệt','Đã duyệt','Đã hủy','Đã hoàn tất'];
        foreach ($status as $name) {
            StatusOrder::insert([
                'name' => $name,
            ]);
        }
    }
}

