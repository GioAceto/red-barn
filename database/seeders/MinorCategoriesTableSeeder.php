<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinorCategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert data into the major_categories table
        DB::table('minor_categories')->insert([
            [
                'name' => 'red wine',
                'slug' => 'red-wine',
                'major_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'white Wine & rosé',
                'slug' => 'white-wine-rose',
                'major_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'champagne & sparkling',
                'slug' => 'champagne-sparkling',
                'major_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'sweet wines',
                'slug' => 'sweet-wines',
                'major_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'whiskey, bourbon, scotch',
                'slug' => 'whiskey',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'brandy & cognac',
                'slug' => 'brandy-cognac',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'tequila & mezcal',
                'slug' => 'tequila-mezcal',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'rum',
                'slug' => 'rum',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'vodka',
                'slug' => 'vodka',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'gin',
                'slug' => 'gin',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'aperitif & vermouth',
                'slug' => 'aperitif',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'liqueurs & cordials',
                'slug' => 'liqueurs',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ready to drink',
                'slug' => 'ready-to-drink',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'non-alcoholic spirits',
                'slug' => 'non-alcoholic-spirits',
                'major_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'import',
                'slug' => 'imported-beer',
                'major_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'hard seltzer & flavored beverages',
                'slug' => 'flavored-beverages',
                'major_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'non-alcoholic beer',
                'slug' => 'non-alcoholic-beer',
                'major_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'beer accessories',
                'slug' => 'beer-accessories',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'bitters',
                'slug' => 'bitters',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'coolers',
                'slug' => 'coolers',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'glassware',
                'slug' => 'glassware',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'mixers & syrups',
                'slug' => 'mixers',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'mixology',
                'slug' => 'mixology',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'party supplies',
                'slug' => 'party-supplies',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'soft drinks',
                'slug' => 'soft-drinks',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'wine accessories',
                'slug' => 'wine-accessories',
                'major_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
