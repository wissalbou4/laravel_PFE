<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
       DB::table('users')->insert([
            [
                'name' => 'Medcin',
                'email' => 'medcin@example.com',
                'password' => Hash::make('password'),
                'role' => 'medcin',
                'image' => 'no_image.jpg',
                'status' => 1,
                'heure_debut' => '08:00:00',
                'heure_fin' => '17:00:00',
                'last_login' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
            [
                'name' => 'Secretaire',
                'email' => 'secretaire@example.com',
                'password' => Hash::make('password'),
                'role' => 'secretaire',
                'image' => 'no_image.jpg',
                'status' => 1,
                'heure_debut' => '09:00:00',
                'heure_fin' => '18:00:00',
                'last_login' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Administratif',
                'email' => 'administratif@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'administratif',
                'image' => 'no_image.jpg',
                'status' => 1,
                'heure_debut' => '08:30:00',
                'heure_fin' => '17:30:00',
                'last_login' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}

