<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{   
    public function run()
    {
        $faker = Faker::create();
        $districts = ['District 1', 'District 2', 'District 3', 'District 4', 'District 5'];

        for ($i = 0; $i < 10; $i++) {
            Customer::insert([
                'name' => $faker->name,
                'zipcode' => $faker->postcode,
                'address' => $faker->address,
                'district' => $faker->randomElement($districts),
                'city' => $faker->city,
                'birthday' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'password' => $faker->password,
                'vip_id' => rand(1, 10),
                'flg_del' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
