<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call(CustomerSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(StatusOrderSeeder::class);
        $this->call(VIPSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
    }
}
