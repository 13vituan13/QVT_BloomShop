<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {   
        $user1 = [
            'name' => 'Vĩ Tuấn',
            'email' => 'admin',
            'password' => Hash::make('abc'),
        ];
        
        $user2 = [
            'name' => 'Nhân Viên 1',
            'email' => 'staff',
            'password' => Hash::make('abc'),
        ];
        
        User::create($user1);
        User::create($user2);
    }
}
