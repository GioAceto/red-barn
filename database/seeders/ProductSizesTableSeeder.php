<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSizesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert data into the major_categories table
        DB::table('product_sizes')->insert([
            [
                'product_id' => 1,
                'sku' => '2190491',
                'size_id' => 6,
                'price' => 14.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'chateau-rauzan-bordeaux-2019',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 2,
                'sku' => '1666390',
                'size_id' => 6,
                'price' => 15.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'mascota-vineyards-mascota-malbec-2020',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 3,
                'sku' => '4341100',
                'size_id' => 6,
                'price' => 18.97,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'alexander-valley-cabernet',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 4,
                'sku' => '1974338',
                'size_id' => 6,
                'price' => 29.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'gabrielle-vivien-chablis',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 5,
                'sku' => '2772639',
                'size_id' => 6,
                'price' => 29.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'marchese-di-borgosole-rose-igt',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 6,
                'sku' => '3840123',
                'size_id' => 5,
                'price' => 16.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'buffalo-trace-1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 6,
                'sku' => '3840124',
                'size_id' => 6,
                'price' => 31.49,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'buffalo-trace-2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 6,
                'sku' => '3840125',
                'size_id' => 8,
                'price' => 59.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => 'buffalo-trace-3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004217',
                'size_id' => 1,
                'price' => 3.49,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004218',
                'size_id' => 3,
                'price' => 7.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004219',
                'size_id' => 3,
                'price' => 7.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004220',
                'size_id' => 5,
                'price' => 14.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004221',
                'size_id' => 6,
                'price' => 24.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004222',
                'size_id' => 7,
                'price' => 27.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-5',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'product_id' => 7,
                'sku' => '3004223',
                'size_id' => 8,
                'price' => 38.99,
                'allocated' => 1,
                'deal' => 0,
                'special' => 0,
                'image' => '1800-silver-6',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
