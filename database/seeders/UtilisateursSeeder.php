<?php

namespace Database\Seeders;

use App\Models\Utilisateurs;
use Illuminate\Database\Seeder;

class UtilisateursSeeder extends Seeder
{
    public function run(): void
    {
        Utilisateurs::factory()->count(10)->create(); // Create 10 users
    }
}