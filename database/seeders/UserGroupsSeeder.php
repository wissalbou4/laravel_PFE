<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_groups')->insert([
            [
                'group_name' => 'Admin',
                'group_level' => 1,
                'group_status' => 1,
            ],
            [
                'group_name' => 'Manager',
                'group_level' => 2,
                'group_status' => 1,
            ],
            [
                'group_name' => 'User',
                'group_level' => 3,
                'group_status' => 1,
            ],
        ]);
    }
}

