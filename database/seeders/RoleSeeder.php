<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Admin' => 'Quản trị viên hệ thống','Staff' => 'Nhân viên hệ thống'];
        foreach ($roles as $role => $description) {
            Role::insert([
                'name' => $role,
                'description' => $description,
            ]);
        }
    }
}

