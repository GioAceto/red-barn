<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert data into the major_categories table
        DB::table('major_categories')->insert([
            [
                'name' => 'wine',
                'slug' => 'wine',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'spirits',
                'slug' => 'spirits',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' =>
                'beer & seltzers',
                'slug' => 'beer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'bar extras',
                'slug' => 'bar-extras',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
