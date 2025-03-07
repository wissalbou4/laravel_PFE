<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriesSeeder::class,
            SuppliersSeeder::class,
            UserGroupsSeeder::class,
            UsersSeeder::class,
            ProductsSeeder::class,
            SalesSeeder::class,
        ]);
    }
}
