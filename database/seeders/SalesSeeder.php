<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'product_id' => 1, // USB-C Cable U1
                'qty' => 5,
                'price' => 100.00,
                'date' => '2025-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2, // Router Model R1
                'qty' => 3,
                'price' => 180.00,
                'date' => '2025-01-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3, // WiFi Extender W1
                'qty' => 7,
                'price' => 280.00,
                'date' => '2025-01-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4, // Laptop Stand S1
                'qty' => 6,
                'price' => 180.00,
                'date' => '2025-02-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5, // External Hard Drive H1
                'qty' => 4,
                'price' => 640.00,
                'date' => '2025-02-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
