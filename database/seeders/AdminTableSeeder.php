<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('admins')->insert([
            'type' => 'super_admin', 
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '12345678910',
            'password' => bcrypt('123456'),
            'is_blocked' => false,
            'is_notify' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 0; $i < 9; $i++) {
            DB::table('admins')->insert([
                'type' => 'admin',
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->phoneNumber,
                'password' => bcrypt('123456'),
                'is_blocked' => false,
                'is_notify' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}