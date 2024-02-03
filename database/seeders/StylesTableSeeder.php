<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert data into the major_categories table
        DB::table('styles')->insert([
            [
                'name' => 'Bordeaux',
                'slug' => 'bordeaux',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cabernet Sauvignon',
                'slug' => 'cabernet-sauvignon',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Malbec',
                'slug' => 'malbec',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Merlot',
                'slug' => 'merlot',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pinot Noir',
                'slug' => 'pinot-noir',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Red Blends',
                'slug' => 'red-blends',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sangiovese',
                'slug' => 'sangiovese',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Syrah / Shiraz',
                'slug' => 'syrah-shiraz',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tempranillo',
                'slug' => 'tempranillo',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zinfandel',
                'slug' => 'zinfandel',
                'minor_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chardonnay',
                'slug' => 'chardonnay',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moscato',
                'slug' => 'moscato',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Orange Wine',
                'slug' => 'orange-wine',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pinot Grigio/Gris',
                'slug' => 'pinot-grigio-gris',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Riesling',
                'slug' => 'riesling',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rosé',
                'slug' => 'rose',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sauvignon Blanc',
                'slug' => 'sauvignon-blanc',
                'minor_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cava',
                'slug' => 'cava',
                'minor_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Champagne',
                'slug' => 'champagne',
                'minor_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Prosecco',
                'slug' => 'prosecco',
                'minor_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sparkling Rosé',
                'slug' => 'sparkling-rose',
                'minor_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dessert & Fortified',
                'slug' => 'dessert-fortified',
                'minor_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Moscato',
                'slug' => 'moscato',
                'minor_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Red',
                'slug' => 'red',
                'minor_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rosé & Blush',
                'slug' => 'rose-blush',
                'minor_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sparkling',
                'slug' => 'sparkling',
                'minor_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'White',
                'slug' => 'white',
                'minor_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bourbon',
                'slug' => 'bourbon',
                'minor_category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Scotch',
                'slug' => 'scotch',
                'minor_category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rye',
                'slug' => 'rye',
                'minor_category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Single Malt',
                'slug' => 'single-malt',
                'minor_category_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Brandy',
                'slug' => 'brandy',
                'minor_category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cognac',
                'slug' => 'cognac',
                'minor_category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Eau de Vie',
                'slug' => 'eau-de-vie',
                'minor_category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Flavored Brandy',
                'slug' => 'flavored-brandy',
                'minor_category_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Blanco',
                'slug' => 'blanco',
                'minor_category_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Reposado',
                'slug' => 'reposado',
                'minor_category_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Añejo',
                'slug' => 'anejo',
                'minor_category_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Extra Añejo',
                'slug' => 'extra-anejo',
                'minor_category_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aged Rum',
                'slug' => 'aged-rum',
                'minor_category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rhum Agricole',
                'slug' => 'rhum-agricole',
                'minor_category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Spiced / Flavored',
                'slug' => 'spiced-flavored',
                'minor_category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dark Rum',
                'slug' => 'dark-rum',
                'minor_category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'White Rum',
                'slug' => 'white-rum',
                'minor_category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cachaça',
                'slug' => 'cachaca',
                'minor_category_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Unflavored',
                'slug' => 'unflavored',
                'minor_category_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Flavored',
                'slug' => 'flavored',
                'minor_category_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'London Dry Gin',
                'slug' => 'london-dry-gin',
                'minor_category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Plymouth Gin',
                'slug' => 'plymouth-gin',
                'minor_category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Old Tom Gin',
                'slug' => 'old-tom-gin',
                'minor_category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aged Gin',
                'slug' => 'aged-gin',
                'minor_category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Flavored Gin',
                'slug' => 'flavored-gin',
                'minor_category_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aperitif',
                'slug' => 'aperitif',
                'minor_category_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vermouth',
                'slug' => 'vermouth',
                'minor_category_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Amaro',
                'slug' => 'amaro',
                'minor_category_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Herbal & Spice',
                'slug' => 'herbal-spice',
                'minor_category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cream',
                'slug' => 'cream',
                'minor_category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Coffee',
                'slug' => 'coffee',
                'minor_category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Chocolate & Dessert',
                'slug' => 'chocolate-dessert',
                'minor_category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Citrus',
                'slug' => 'citrus',
                'minor_category_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Tequila',
                'slug' => 'tequila',
                'minor_category_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Vodka',
                'slug' => 'vodka',
                'minor_category_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Gin',
                'slug' => 'gin',
                'minor_category_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Rum',
                'slug' => 'rum',
                'minor_category_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
