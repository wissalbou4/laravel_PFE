<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'user_level' => 1,
                'image' => 'no_image.jpg',
                'status' => 1,
                'last_login' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'username' => 'manager',
                'email' => 'manager@example.com',
                'password' => Hash::make('password'),
                'user_level' => 2,
                'image' => 'no_image.jpg',
                'status' => 1,
                'last_login' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Youssouf',
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'user_level' => 3,
                'image' => 'no_image.jpg',
                'status' => 1,
                'last_login' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
