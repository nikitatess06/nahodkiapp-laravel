<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('findings')->insert([
            'username' => 'test_user',
            'name' => Str::random(100),
            'latitude' => rand(51.09 * 100000, 56.17 * 100000) / 100000,
            'longitude' => rand(23.18 * 100000, 32.75 * 100000) / 100000,
            'contacts' => rand(1, 100),
            'media' => 'public/ok.jpg',
            ]);
        }
        DB::table('users')->insert([
            'name' => 'bob',
            'password' => Hash::make('password'),
        ]);
      
    }
}
