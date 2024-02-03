<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert data into the major_categories table
        DB::table('sizes')->insert([
            ['size' => 50, 'units' => 'ml', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 100, 'units' => 'ml', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 200, 'units' => 'ml', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 350, 'units' => 'ml', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 375, 'units' => 'ml', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 750, 'units' => 'ml', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 1, 'units' => 'l', 'created_at' => now(), 'updated_at' => now()],
            ['size' => 1.75, 'units' => 'l', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
