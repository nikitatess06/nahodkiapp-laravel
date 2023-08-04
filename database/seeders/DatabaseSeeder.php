<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
            'name' => Str::random(100),
            'location' => Str::random(100),
            'contacts' => rand(1, 100),
            ]);
        }
        DB::table('users')->insert([
            'name' => Str::random(1),
            'password' => Hash::make('password'),
        ]);
    }
}
