<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert data into the major_categories table
        DB::table('products')->insert([
            [
                'name' => 'chateau rauzan despagne bordeaux, 2019',
                'brand' => 'chateau rauzan despagne',
                'description' => 'Beverage Dynamics-France - Bordeaux - Bordeaux/Bordeaux Superieur - "This is a super-approachable blend with a great structure and an impressive linger with soft tannins. Blueberries, cherry cola and some pepper notes from the cabernet franc are softened by the sumptuous fruit on the palate.',
                'country_of_origin' => 'france',
                'abv' => 13.5,
                'major_category_id' => 1,
                'minor_category_id' => 1,
                'style_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'mascota vineyards la mascota malbec, 2020',
                'brand' => 'mascota vineyards',
                'description' => 'James Suckling-Argentina - Mendoza - Dark-berry, black-chocolate and tar aromas follow through to a medium to full body with juicy fruit, as well as asphalt and burnt-orange undertones. Drink or hold.',
                'country_of_origin' => 'argentina',
                'abv' => 14,
                'major_category_id' => 1,
                'minor_category_id' => 1,
                'style_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Alexander Valley Cabernet',
                'brand' => 'alexander valley',
                'description' => 'California- Alexander Valley Vineyards Cabernet Sauvignon has great texture and structure with a medium mouth feel. There are aromas of dark plum, cherry, cassis, warm barrel spice, vanilla and dark chocolate.',
                'country_of_origin' => 'united states',
                'abv' => 16,
                'major_category_id' => 1,
                'minor_category_id' => 3,
                'style_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gabrielle Vivien Chablis',
                'brand' => 'Domaine Gabrielle Vivien',
                'description' => 'France - Burgundy - Chablis - A lovely crisp Chardonnay with plenty of green apple and pear, chalk, and most importantly the firm backbone of minerality that makes Chablis so compelling.',
                'country_of_origin' => 'france',
                'abv' => 13,
                'major_category_id' => 1,
                'minor_category_id' => 2,
                'style_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Marchese Di Borgosole Rose Puglia IGT',
                'brand' => 'Marchese di Borgosole',
                'description' => 'Apulia, Italy- Elegant, rose color. Fresh, varietals aromas that become more complex with time. Very interesting structure due to the balance between soft tannins, acidity and residual sugar. A perfect Italian rose!',
                'country_of_origin' => 'italy',
                'abv' => 12,
                'major_category_id' => 1,
                'minor_category_id' => 2,
                'style_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'buffalo trace kentucky straight bourbon whiskey',
                'brand' => 'buffalo trace',
                'description' => 'Kentucky, USA- Thick, mature aromas, with notes of subtle spice, meadow grass, light molasses and leather. Pleasantly sweet at first in flavor, with notes of brown sugar and cinnamon, becoming dry with enveloping flavors of oak and leather. Finish long and dry.',
                'country_of_origin' => 'united states',
                'abv' => 45,
                'major_category_id' => 2,
                'minor_category_id' => 5,
                'style_id' => 28,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '1800 silver tequila',
                'brand' => '1800',
                'description' => 'Mexico - 40% - Mexico - Clean, delicate, balanced, smooth. Soft, sweet, floral, fruit, agave. Medium finish. Rested in mostly American oak, with a small portion of French oak for up to 15 days.',
                'country_of_origin' => 'mexico',
                'abv' => 40,
                'major_category_id' => 2,
                'minor_category_id' => 5,
                'style_id' => 36,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
