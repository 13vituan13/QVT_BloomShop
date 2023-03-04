<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $types = ['Type A', 'Type B', 'Type C', 'Type D', 'Type E', 'Type F', 'Type G', 'Type H', 'Type I', 'Type J'];

        foreach ($types as $type) {
            DB::table('type')->insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

