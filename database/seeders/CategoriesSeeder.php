<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Laptops',
                'description' => 'Various types of laptops including gaming, business, and personal laptops',
            ],
            [
                'name' => 'Printers',
                'description' => 'Printers for home and office use, including laser and inkjet printers',
            ],
            [
                'name' => 'Keyboards',
                'description' => 'Mechanical and membrane keyboards for desktop and laptop use',
            ],
            [
                'name' => 'Mice',
                'description' => 'Wired and wireless computer mice for different usage',
            ],
            [
                'name' => 'Monitors',
                'description' => 'Computer monitors including LED, LCD, and 4K models',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Various computer accessories including laptop bags, cables, etc.',
            ],
            [
                'name' => 'Networking',
                'description' => 'Networking devices including routers, switches, and modems',
            ],
        ]);
    }
}
