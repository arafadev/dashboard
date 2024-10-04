<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ar_SA');
        $users = [];
        for ($i = 0; $i < 10 ; $i++) {
          $user = [
            'name'         => $faker->name,
            'phone'        => "51111111$i",
            'email'        => $faker->unique()->email,
            'password'     => bcrypt('123456'),
            'is_blocked'      => rand(0, 1),
            'active'       => rand(0, 1),
          ];
          
          User::create($user) ; 
        }
    }
}
