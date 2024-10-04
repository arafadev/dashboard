<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('providers')->insert([
            'name' => 'Provider',
            'username' => 'provider1',
            'email' => 'provider@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '12345678910',
            'join_date' => now(),
            'info' => 'This is the first provider',
            'address' => '123 Provider St.',
            'status' => 'active',
            'last_seen' => now(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       Provider::factory(10)->create();
    }
}
