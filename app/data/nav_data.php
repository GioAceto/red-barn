<?php

$nav_data = [
    "Wine" => [
        "Red Wine" => [
            "tag" => "red",
            "sub_categories" => [
                "Bordeaux" => ["route" => "/explore/wine/red-wine/bordeaux"],
                "Cabernet Sauvignon" => ["route" => "/explore/wine/red-wine/cabernet-sauvignon"],
                "Malbec" => ["route" => "/explore/wine/red-wine/malbec"],
                "Merlot" => ["route" => "/explore/wine/red-wine/merlot"],
                "Pinot Noir" => ["route" => "/explore/wine/red-wine/pinot-noir"],
                "Red Blends" => ["route" => "/explore/wine/red-wine/red-blends"],
                "Sangiovese" => ["route" => "/explore/wine/red-wine/sangiovese"],
                "Syrah / Shiraz" => ["route" => "/explore/wine/red-wine/syrah-shiraz"],
                "Tempranillo" => ["route" => "/explore/wine/red-wine/tempranillo"],
                "Zinfandel" => ["route" => "/explore/wine/red-wine/zinfandel"],
                "Shop All Red Wines" => ["route" => "/explore/wine/red-wine"]
            ],
            "route" => "/explore/wine/red-wine"
        ],
        "White Wine & Rosé" => [
            "tag" => "white",
            "sub_categories" => [
                "Chardonnay" => ["route" => "/explore/wine/white-wine/chardonnay"],
                "Moscato" => ["route" => "/explore/wine/white-wine/moscato"],
                "Orange Wine" => ["route" => "/explore/wine/white-wine/orange-wine"],
                "Pinot Grigio/Gris" => ["route" => "/explore/wine/white-wine/pinot-grigio"],
                "Riesling" => ["route" => "/explore/wine/white-wine/riesling"],
                "Rosé" => ["route" => "/explore/wine/white-wine/rose"],
                "Sauvignon Blanc" => ["route" => "/explore/wine/white-wine/sauvignon-blanc"],
                "Shop All White Wines" => ["route" => "/explore/wine/white-wine"]
            ],
            "route" => "/explore/wine/white-wine-rose"
        ],
        "Champagne & Sparkling" => [
            "tag" => "champagne",
            "sub_categories" => [
                "Cava" => ["route" => "/explore/wine/champagne-sparkling/cava"],
                "Champagne"  => ["route" => "/explore/wine/champagne-sparkling/champagne"],
                "Prosecco"  => ["route" => "/explore/wine/champagne-sparkling/prosecco"],
                "Sparkling Rosé"  => ["route" => "/explore/wine/champagne-sparkling/sparkling-rose"],
                "Shop All Sparkling Wines"  => ["route" => "/explore/wine/champagne-sparkling"]
            ],
            "route" => "/explore/wine/champagne-sparkling"
        ],
        "Sweet Wines" => [
            "tag" => "sweet",
            "sub_categories" => [
                "Dessert & Fortified" => ["route" => "/explore/wine/sweet-wine/dessert-fortified"],
                "Moscato" => ["route" => "/explore/wine/white-wine/moscato"],
                "Red" => ["route" => "/explore/wine/sweet-wine/sweet-red"],
                "Rosé & Blush" => ["route" => "/explore/wine/sweet-wine/sweet-rose-blush"],
                "Sparkling" => ["route" => "/explore/wine/sweet-wine/sweet-sparkling"],
                "White" => ["route" => "/explore/wine/sweet-wine/sweet-white"],
                "Shop All Sweet Wines" => ["route" => "/explore/wine/sweet-wine"]
            ],
            "route" => "/explore/wine/sweet-wines"
        ],
        "Shop All Wines" => [
            "tag" => "all-wine",
            "sub_categories" => ["Shop All Wines" => []],
        ],
        "route" => "/explore/wine"
    ],
    "Spirits" => [
        "Whiskey, Bourbon, Scotch" => [
            "tag" => "whiskey",
            "route" => "/explore/spirits/whiskey"
        ],
        "Brandy & Cognac" => [
            "tag" => "brandy",
            "route" => "/explore/spirits/brandy-cognac"
        ],
        "Tequila & Mezcal" => [
            "tag" => "tequila",
            "route" => "/explore/spirits/tequila-mezcal"
        ],
        "Rum" => [
            "tag" => "rum",
            "route" => "/explore/spirits/rum"
        ],
        "Vodka" => [
            "tag" => "vodka",
            "route" => "/explore/spirits/vodka"
        ],
        "Gin" => [
            "tag" => "gin",
            "route" => "/explore/spirits/gin"
        ],
        "Aperitif & Vermouth" => [
            "tag" => "aperitif",
            "route" => "/explore/spirits/aperitif"
        ],
        "Liqueurs & Cordials" => [
            "tag" => "liqueur",
            "route" => "/explore/spirits/liqueurs"
        ],
        "Ready to Drink" => [
            "tag" => "rtd",
            "route" => "/explore/spirits/ready-to-drink"
        ],
        "Non-Alcoholic Spirits" => [
            "tag" => "na-spirits",
            "route" => "/explore/spirits/non-alcoholic-spirits"
        ],
        "Allocated Spirits" => [
            "tag" => "allocated",
            "route" => "/explore/spirits/allocated-spirits"
        ],
        "Shop All Spirits" => [
            "tag" => "all-spirits",
            "route" => "/explore/spirits"
        ]
    ],
    "Beer & Seltzer" => [
        "Popular Beer Styles" => [
            "tag" => "styles",
            "sub_categories" => [
                "Ale" => ["route" => "/explore/beer/ale"],
                "Hard Seltzer" => ["route" => "/explore/beer/hard-seltzer"],
                "IPA" => ["route" => "/explore/beer/ipa"],
                "Lager" => ["route" => "/explore/beer/lager"],
                "Light Beer" => ["route" => "/explore/beer/light-beer"],
                "New England / Hazy IPA" => ["route" => "/explore/beer/ipa/?style=neipa"],
                "Pilsner" => ["route" => "/explore/beer/pilsner"],
                "Porter" => ["route" => "/explore/beer/porter"],
                "Sour" => ["route" => "/explore/beer/sour"],
                "Stout" => ["route" => "/explore/beer/stout"],
                "West Coast IPA" => ["route" => "/explore/beer/ipa/?style=wcipa"],
                "Shop All Beer Styles" => ["route" => "/explore/beer/styles"]
            ],
            "route" => "/explore/beer/styles",
        ],
        "Import" => [
            "tag" => "import",
            "sub_categories" => [
                "Belgium" => ["route" => "/explore/beer/?origin=belgium"],
                "Canada" => ["route" => "/explore/beer/?origin=canada"],
                "England" => ["route" => "/explore/beer/?origin=england"],
                "Germany" => ["route" => "/explore/beer/?origin=germany"],
                "Ireland" => ["route" => "/explore/beer/?origin=ireland"],
                "Japan" => ["route" => "/explore/beer/?origin=japan"],
                "Mexico" => ["route" => "/explore/beer/?origin=mexico"],
                "Netherlands" => ["route" => "/explore/beer/?origin=netherlands"],
            ],
            "route" => "/explore/beer/imported-beer",
        ],
        "Hard Seltzer & Flavored Beverages" => [
            "tag" => "seltzer",
            "sub_categories" => [
                "Canned Cocktails" => ["route" => "/explore/beer/flavored-beverages/canned-cocktails"],
                "Hard Coffee" => ["route" => "/explore/beer/flavored-beverages/hard-coffee"],
                "Hard Seltzer" => ["route" => "/explore/beer/flavored-beverages/hard-seltzer"],
                "Hard Tea / Lemonade" => ["route" => "/explore/beer/flavored-beverages/tea-lemonade"],
                "All Flavored Beverages" => ["route" => "/explore/beer/flavored-beverages"],
            ],
            "route" => "/explore/beer/flavored-beverages",
        ],
        "Non-Alcoholic Beer" => [
            "tag" => "na-beer",
            "route" => "/explore/beer/non-alcoholic-beer"
        ],
        "Shop All Beer" => [
            "tag" => "all-beer",
            "route" => "/explore/beer"
        ],
        "route" => "/explore/beer"
    ],
    "Bar Extras" => [
        "Beer Accessories" => [
            "tag" => "beer-accessories",
            "route" => "/explore/bar-extras/beer-accessories"
        ],
        "Bitters" => [
            "tag" => "bitters",
            "route" => "/explore/bar-extras/bitters"
        ],
        "Coolers" => [
            "tag" => "coolers",
            "route" => "/explore/bar-extras/coolers"
        ],
        "Glassware" => [
            "tag" => "glassware",
            "route" => "/explore/bar-extras/glassware"
        ],
        "Mixers & Syrups" => [
            "tag" => "mixers",
            "route" => "/explore/bar-extras/mixers"
        ],
        "Mixology" => [
            "tag" => "mixology",
            "route" => "/explore/bar-extras/mixology"
        ],
        "Party Supplies" => [
            "tag" => "supplies",
            "route" => "/explore/bar-extras/party-supplies"
        ],
        "Soft Drinks" => [
            "tag" => "soft-drinks",
            "route" => "/explore/bar-extras/soft-drinks"
        ],
        "Wine Accessories" => [
            "tag" => "wine-accessories",
            "route" => "/explore/bar-extras/wine-accessories"
        ],
        "Shop All Bar Extras" => [
            "tag" => "all-extras",
            "route" => "/explore/bar-extras"
        ],
    ]
];
