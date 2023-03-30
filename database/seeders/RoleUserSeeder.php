<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleUser;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        $roles = [1,2];
        foreach ($roles as $item) {
            RoleUser::insert([
                'role_id' => $item,
                'user_id' => $item,
            ]);
        }
    }
}

