<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Style;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Models\MajorCategory;
use App\Models\MinorCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller

{
    public function store(Request $request)
    {
        $rules = [
            'major_category' => ['required', 'max:255'],
            'major_slug' => ['required', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'minor_category' => ['required', 'max:255'],
            'minor_slug' => ['required', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'style' => ['max:255'],
            'style_slug' => ['max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'size' => ['required'],
            'name' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'abv' => ['required'],
            'country_of_origin' => ['required', 'max:255'],
            'state' => ['max:255'],
            'description' => ['max:1000'],
            'sku' => ['required', 'numeric', 'digits:7'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp']
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field exceeds the character limit',
            'sku.numeric' => 'SKU must be numeric',
            'sku.digits' => 'SKU must be 7 digits long',
            'image.image' => 'The selected file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'regex' => 'The :attribute field must be a valid slug.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->messages()->toArray())
                ->redirectTo('/account');
        }

        // Store the uploaded file
        $imagePath = $request->file('image')->store('images', 'public');

        $this->getOrCreateMajorCategory($request);

        $this->getOrCreateMinorCategory($request);

        $this->getOrCreateStyle($request);

        $this->getOrCreateSize($request);

        $this->getOrCreateProduct($request);

        $this->getOrCreateProductSize($request, $imagePath);

        return redirect()->back();
    }

    private function getOrCreateMajorCategory(Request $request)
    {
        // Generate slug for major category
        $majorCategorySlug = $request->input('major_slug');

        // Check and retrieve major category
        return MajorCategory::firstOrCreate(['slug' => $majorCategorySlug], [
            'name' => $request->input('major_category'),
        ]);
    }

    private function getOrCreateMinorCategory(Request $request)
    {
        // Generate slug for minor category
        $minorCategorySlug = $request->input('minor_slug');

        // Check and retrieve major category
        $majorCategory = $this->getOrCreateMajorCategory($request);

        // Check and retrieve minor category within the specified major category
        return MinorCategory::firstOrCreate([
            'name' => $request->input('minor_category'),
            'slug' => $minorCategorySlug,
            'major_category_id' => $majorCategory->id,
        ]);
    }

    private function getOrCreateStyle(Request $request)
    {
        // Generate slug for minor category
        $styleSlug = $request->input('style_slug');

        // Check and retrieve major category
        $minorCategory = $this->getOrCreateMinorCategory($request);

        // Check and retrieve minor category within the specified major category
        return Style::firstOrCreate([
            'name' => $request->input('style'),
            'slug' => $styleSlug,
            'minor_category_id' => $minorCategory->id,
        ]);
    }

    private function getOrCreateSize(Request $request)
    {
        return Size::firstOrCreate([
            'size' => $request->input('size'),
            'units' => $request->input('units')
        ]);
    }

    private function getOrCreateProduct(Request $request)
    {
        $majorCategory = $this->getOrCreateMajorCategory($request);
        $minorCategory = $this->getOrCreateMinorCategory($request);
        $style = $this->getOrCreateStyle($request);

        return Product::firstOrCreate([
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'country_of_origin' => $request->input('country_of_origin'),
            'state' => $request->input('state'),
            'abv' => $request->input('abv'),
            'gluten_free' => $request->input('gluten_free'),
            'non_alcoholic' => $request->input('non_alcoholic'),
            'major_category_id' => $majorCategory->id,
            'minor_category_id' => $minorCategory->id,
            'style_id' => $style->id,
        ]);
    }

    private function getOrCreateProductSize(Request $request, $imagePath)
    {
        $product = $this->getOrCreateProduct($request);
        $size = $this->getOrCreateSize($request);

        return ProductSize::firstOrCreate([
            'product_id' => $product->id,
            'sku' => $request->input('sku'),
            'size_id' => $size->id,
            'is_default_size' => $request->input('is_default_size'),
            'price' => $request->input('price'),
            'allocated' => $request->input('allocated'),
            'deal' => $request->input('deal'),
            'deal_price' => $request->input('deal_price'),
            'special' => $request->input('special'),
            'special_id' => $request->input('special_id'),
            'image' => $imagePath,
        ]);
    }

    public function show($majorCategory, $minorCategory = null, $style = null)
    {
        // Find the major category by name
        $majorCategoryModel = MajorCategory::where('slug', $majorCategory)->first();

        if (!$majorCategoryModel) {
            // Handle the case where the major category is not found
            return abort(404);
        }

        // If $minorCategory is provided, retrieve the specific minor category associated with the major category
        if ($minorCategory) {

            $minorCategoryModel = $this->getMinorCategory($majorCategoryModel, $minorCategory);
            $styles = $this->getStyles($majorCategoryModel, $minorCategoryModel, $style);

            $trendingProducts = $this->getTrendingProductsQuery($majorCategoryModel, $minorCategoryModel)->get();

            $dealProducts = $this->getDealProductsQuery($majorCategoryModel, $minorCategoryModel)->get();

            $recentProducts = $this->getRecentProductsQuery($majorCategoryModel, $minorCategoryModel)->get();

            // If $style is provided, retrieve styles associated with the major and minor categories
            if ($style) {
                // Pass the data to the view for showAll with styles
                return view('products.showAll', [
                    'majorCategory' => $majorCategoryModel,
                    'minorCategory' => $minorCategoryModel,
                    'minorCategories' => collect([$minorCategoryModel]),
                    'trendingProducts' => $trendingProducts,
                    'dealProducts' => $dealProducts,
                    'recentProducts' => $recentProducts,
                ]);
            }

            // Pass the data to the view for showAll without styles
            return view('products.showAll', [
                'majorCategory' => $majorCategoryModel,
                'minorCategory' => $minorCategoryModel,
                'minorCategories' => collect([$minorCategoryModel]),
                'styles' => $styles,
                'trendingProducts' => $trendingProducts,
                'dealProducts' => $dealProducts,
                'recentProducts' => $recentProducts,
            ]);
        }

        // If $minorCategory is not provided, retrieve all minor categories associated with the major category
        $minorCategories = $this->getAllMinorCategories($majorCategoryModel);

        $trendingProducts = $this->getTrendingProductsQuery($majorCategoryModel)->get();

        $dealProducts = $this->getDealProductsQuery($majorCategoryModel)->get();

        $recentProducts = $this->getRecentProductsQuery($majorCategoryModel)->get();

        // Pass the data to the view for showAll without styles
        return view('products.showAll', [
            'majorCategory' => $majorCategoryModel,
            'minorCategories' => $minorCategories,
            'trendingProducts' => $trendingProducts,
            'dealProducts' => $dealProducts,
            'recentProducts' => $recentProducts,
        ]);
    }

    // Helper method to get a specific minor category
    private function getMinorCategory($majorCategory, $minorCategorySlug)
    {
        return MinorCategory::where('major_category_id', $majorCategory->id)
            ->where('slug', $minorCategorySlug)
            ->firstOrFail();
    }

    // Helper method to get all minor categories associated with a major category
    private function getAllMinorCategories($majorCategory)
    {
        return MinorCategory::where('major_category_id', $majorCategory->id)->get();
    }

    // Helper method to get styles associated with the major and minor categories
    private function getStyles($majorCategory, $minorCategory, $styleSlug)
    {
        return Style::where('minor_category_id', $minorCategory->id)->get();
    }

    public function getMinorCategories($majorCategoryId)
    {
        $minorCategories = MinorCategory::where('major_category_id', $majorCategoryId)->get();

        return response()->json($minorCategories);
    }

    private function getTrendingProductsQuery(MajorCategory $majorCategory, MinorCategory $minorCategory = null)
    {
        $query = Product::join('product_sizes', 'products.id', '=', 'product_sizes.product_id')
            ->where('product_sizes.trending', 1)
            ->where('products.major_category_id', $majorCategory->id)
            ->orderBy('products.updated_at', 'desc') // Order by most recent updated_at date
            ->take(12); // Limit the results to 12

        if ($minorCategory) {
            $query->where('products.minor_category_id', $minorCategory->id);
        }

        return $query;
    }

    private function getDealProductsQuery(MajorCategory $majorCategory, MinorCategory $minorCategory = null)
    {
        $query = Product::join('product_sizes', 'products.id', '=', 'product_sizes.product_id')
            ->where('product_sizes.deal', 1) // Retrieve products with a deal value of 1
            ->where('products.major_category_id', $majorCategory->id)
            ->orderBy('products.updated_at', 'desc') // Order by most recent updated_at date
            ->take(12); // Limit the results to 12

        if ($minorCategory) {
            $query->where('products.minor_category_id', $minorCategory->id);
        }

        return $query;
    }

    private function getRecentProductsQuery(MajorCategory $majorCategory, MinorCategory $minorCategory = null)
    {
        $query = Product::join('product_sizes', 'products.id', '=', 'product_sizes.product_id')
            ->where('products.major_category_id', $majorCategory->id)
            ->where('product_sizes.is_default_size', 1) // Only products with is_default_size equal to 1
            ->orderBy('products.created_at', 'desc') // Order by most recent created_at date
            ->take(12); // Limit the results to 12

        if ($minorCategory) {
            $query->where('products.minor_category_id', $minorCategory->id);
        }

        return $query;
    }

    public function showWithFilters($majorCategory, $minorCategory = null, $style = null)
    {
        $majorCategoryModel = MajorCategory::where('slug', $majorCategory)->first();
        $minorCategoryModel = MinorCategory::where('slug', $minorCategory)->first();
        $styleModel = Style::where('slug', $style)->first();

        $price = request('price', []);
        $abv = request('abv', []);
        $size = request('size', []);
        $countries = request('country', []);
        $region = request('region');
        $sort = request('sort');

        $priceRanges = [
            '0-10' => [[0, 10], '< 10$'],
            '10-20' => [[10, 20], '$10 to $20'],
            '20-30' => [[20, 30], '$20 to $30'],
            '30-40' => [[30, 40], '$30 to $40'],
            '40-50' => [[40, 50], '$40 to $50'],
            '50-60' => [[50, 60], '$50 to $60'],
            'max' => [[60], '$60 +'],
        ];

        $abvRanges = [
            '0-5' => [[0, 5], '< 5%'],
            '5-10' => [[5, 10], '5% to 10%'],
            '10-15' => [[10, 15], '10% to 15%'],
            '15-20' => [[15, 20], '15% to 20%'],
            '20-25' => [[20, 25], '20% to 25%'],
            '25-30' => [[25, 30], '25% to 30%'],
            '30-35' => [[30, 35], '30% to 35%'],
            '35-40' => [[35, 40], '35% to 40%'],
            '40-45' => [[40, 45], '40% to 45%'],
            '45-50' => [[45, 50], '45% to 50%'],
            'max' => [[50], '50% +'],
        ];

        $majorCategories = MajorCategory::all();

        $sizes = Size::all();

        $minorCategories = MinorCategory::whereHas('majorCategory', function ($query) use ($majorCategory) {
            $query->where('name', $majorCategory);
        })->get();

        if (!$majorCategoryModel) {
            // Handle the case where the major category is not found
            return abort(404);
        }

        $styles = [];

        $productsQuery = $majorCategoryModel->products()->with('productSizes');

        $availableCountries = Product::whereHas('majorCategory', function ($query) use ($majorCategory) {
            $query->where('slug', $majorCategory);
        })->pluck('country_of_origin')->unique()->sort();

        $filteredSizesQuery = ProductSize::whereHas('product.majorCategory', function ($query) use ($majorCategory) {
            $query->where('slug', $majorCategory);
        });

        $filteredPriceRanges = array_filter($priceRanges, function ($rangeData, $rangeKey) use ($majorCategory) {
            // Extract min and max prices from the rangeData
            list($minPrice, $maxPrice) = array_pad($rangeData[0], 2, null); // Ensure at least two elements in the array

            // Check if there are any products in the current range and major category
            $exists = ProductSize::where(function ($query) use ($minPrice, $maxPrice) {
                $query->where('price', '>=', $minPrice);
                if ($maxPrice !== null) {
                    $query->where('price', '<=', $maxPrice); // Exclude this line if maxPrice is not specified
                }
            })
                ->when($majorCategory, function ($query) use ($majorCategory) {
                    $query->whereHas('product.majorCategory', function ($query) use ($majorCategory) {
                        $query->where('slug', $majorCategory);
                    });
                })
                ->exists();

            return $exists;
        }, ARRAY_FILTER_USE_BOTH);

        $filteredAbvRanges = array_filter($abvRanges, function ($rangeData, $rangeKey) use ($majorCategory) {
            // Extract min and max ABV from the rangeData
            list($minAbv, $maxAbv) = array_pad($rangeData[0], 2, null); // Ensure at least two elements in the array

            // Check if there are any products in the current range and major category
            $exists = Product::where(function ($query) use ($minAbv, $maxAbv) {
                $query->where('abv', '>=', $minAbv);
                if ($maxAbv !== null) {
                    $query->where('abv', '<=', $maxAbv); // Exclude this line if maxAbv is not specified
                }
            })
                ->when($majorCategory, function ($query) use ($majorCategory) {
                    $query->whereHas('majorCategory', function ($query) use ($majorCategory) {
                        $query->where('slug', $majorCategory);
                    });
                })
                ->exists();

            return $exists;
        }, ARRAY_FILTER_USE_BOTH);


        if ($minorCategory) {
            $minorCategoryModel = MinorCategory::where('slug', $minorCategory)->firstOrFail();

            $productsQuery->whereHas('minorCategory', function ($query) use ($minorCategory) {
                $query->where('slug', $minorCategory);
            });

            // Fetch available countries dynamically based on $minorCategory
            $availableCountriesQuery = Product::whereHas('minorCategory', function ($query) use ($minorCategory) {
                $query->where('slug', $minorCategory);
            });
            $availableCountries = $availableCountriesQuery->pluck('country_of_origin')->unique()->sort();

            $styles = $minorCategoryModel->styles;

            $filteredAbvRanges = array_filter($abvRanges, function ($rangeData, $rangeKey) use ($minorCategory) {
                // Check if the range key is 'max'
                if ($rangeKey === 'max') {
                    $minAbv = $rangeData[0][0];
                    $maxAbv = null; // No upper limit for 'max'
                } else {
                    // Extract min and max ABV from the rangeData
                    list($minAbv, $maxAbv) = $rangeData[0];
                }

                // Check if there are any products in the current range and minor category
                $exists = Product::whereBetween('abv', [$minAbv, $maxAbv])
                    ->when($minorCategory, function ($query) use ($minorCategory) {
                        $query->whereHas('minorCategory', function ($query) use ($minorCategory) {
                            $query->where('slug', $minorCategory);
                        });
                    })
                    ->exists();

                return $exists;
            }, ARRAY_FILTER_USE_BOTH);

            $filteredPriceRanges = array_filter($priceRanges, function ($rangeData, $rangeKey) use ($minorCategory) {
                // Extract min and max prices from the rangeData
                list($minPrice, $maxPrice) = array_pad($rangeData[0], 2, null); // Ensure at least two elements in the array

                // Check if there are any products in the current range and minor category
                $exists = ProductSize::where(function ($query) use ($minPrice, $maxPrice) {
                    $query->where('price', '>=', $minPrice);
                    if ($maxPrice !== null) {
                        $query->where('price', '<=', $maxPrice); // Exclude this line if maxPrice is not specified
                    }
                })
                    ->when($minorCategory, function ($query) use ($minorCategory) {
                        $query->whereHas('product.minorCategory', function ($query) use ($minorCategory) {
                            $query->where('slug', $minorCategory);
                        });
                    })
                    ->exists();

                return $exists;
            }, ARRAY_FILTER_USE_BOTH);

            $filteredSizesQuery->whereHas('product.minorCategory', function ($query) use ($minorCategory) {
                $query->where('slug', $minorCategory);
            });
        }


        if ($style) {
            $productsQuery->whereHas('style', function ($query) use ($style) {
                $query->where('slug', $style);
            });

            // Fetch available countries dynamically based on $style
            $availableCountriesQuery = Product::whereHas('style', function ($query) use ($style) {
                $query->where('slug', $style);
            });
            $availableCountries = $availableCountriesQuery->pluck('country_of_origin')->unique()->sort();

            $filteredAbvRanges = array_filter($abvRanges, function ($rangeData, $rangeKey) use ($minorCategory, $style) {
                // Check if the range key is 'max'
                if ($rangeKey === 'max') {
                    $minAbv = $rangeData[0][0];
                    $maxAbv = null; // No upper limit for 'max'
                } else {
                    // Extract min and max ABV from the rangeData
                    list($minAbv, $maxAbv) = $rangeData[0];
                }

                // Check if there are any products in the current range, minor category, and style
                $exists = Product::whereBetween('abv', [$minAbv, $maxAbv])
                    ->when($minorCategory, function ($query) use ($minorCategory) {
                        $query->whereHas('minorCategory', function ($query) use ($minorCategory) {
                            $query->where('slug', $minorCategory);
                        });
                    })
                    ->when($style, function ($query) use ($style) {
                        $query->whereHas('style', function ($query) use ($style) {
                            $query->where('slug', $style);
                        });
                    })
                    ->exists();

                return $exists;
            }, ARRAY_FILTER_USE_BOTH);

            $filteredPriceRanges = array_filter($priceRanges, function ($rangeData, $rangeKey) use ($minorCategory, $style) {
                // Extract min and max prices from the rangeData
                list($minPrice, $maxPrice) = array_pad($rangeData[0], 2, null); // Ensure at least two elements in the array

                // Check if there are any products in the current range, minor category, and style
                $exists = ProductSize::where(function ($query) use ($minPrice, $maxPrice) {
                    $query->where('price', '>=', $minPrice);
                    if ($maxPrice !== null) {
                        $query->where('price', '<=', $maxPrice); // Exclude this line if maxPrice is not specified
                    }
                })
                    ->when($minorCategory, function ($query) use ($minorCategory) {
                        $query->whereHas('product.minorCategory', function ($query) use ($minorCategory) {
                            $query->where('slug', $minorCategory);
                        });
                    })
                    ->when($style, function ($query) use ($style) {
                        $query->whereHas('product.style', function ($query) use ($style) {
                            $query->where('slug', $style);
                        });
                    })
                    ->exists();

                return $exists;
            }, ARRAY_FILTER_USE_BOTH);

            $filteredSizesQuery->whereHas('product.style', function ($query) use ($style) {
                $query->where('slug', $style);
            });
        }

        if (!empty($price)) {
            // If $price is not empty, add a condition to filter by price range

            $newPrice = explode(',', $price);

            $productsQuery->where(function ($query) use ($newPrice, $priceRanges) {
                foreach ($newPrice as $value) {
                    $rangeValues = $priceRanges[$value] ?? null;
                    if ($rangeValues) {
                        // Check if the value corresponds to a known range
                        list($minPrice, $maxPrice) = array_pad($rangeValues[0], 2, null);

                        if ($maxPrice !== null) {
                            $query->orWhereHas('productSizes', function ($query) use ($minPrice, $maxPrice) {
                                $query->whereBetween('price', [$minPrice, $maxPrice]);
                            });
                        } else {
                            // Use >= for a single value range
                            $query->orWhereHas('productSizes', function ($query) use ($minPrice) {
                                $query->where('price', '>=', $minPrice);
                            });
                        }
                    }
                }
            });

            $productsQuery->get();
        }

        if (!empty($abv)) {
            // If $abv is not empty, add a condition to filter by ABV range

            $newAbv = explode(',', $abv);

            $productsQuery->where(function ($query) use ($newAbv, $abvRanges) {
                foreach ($newAbv as $value) {
                    $rangeValues = $abvRanges[$value] ?? null;
                    if ($rangeValues) {
                        // Check if the value corresponds to a known range
                        if (count($rangeValues[0]) == 2) {
                            $query->orWhereBetween('abv', $rangeValues);
                        } elseif (count($rangeValues[0]) == 1) {
                            // Use >= for a single value range
                            $query->orWhere('abv', '>=', $rangeValues[0][0]);
                        }
                    }
                }
            });

            $productsQuery->get();
        }

        if (!empty($size)) {
            $sizeValues = explode(',', $size);

            $productsQuery->join('product_sizes', 'products.id', '=', 'product_sizes.product_id')
                ->join('sizes', 'product_sizes.size_id', '=', 'sizes.id')
                ->whereIn('sizes.size', $sizeValues);

            $productsQuery->select('products.*', 'product_sizes.image as size_image', 'product_sizes.price as size_price', 'sizes.size as product_size', 'sizes.units as product_units');
        } else {
            // If no size is specified, sort by 'created_at' in descending order
            $productsQuery->orderBy('products.created_at', 'desc');
        }

        if (!empty($countries)) {
            // If $countries is an array, use it directly
            // If it's a string, convert it to an array
            $countriesArray = is_array($countries) ? $countries : explode(',', $countries);
            $productsQuery->whereIn('country_of_origin', $countriesArray);
        }

        $filteredSizes = $filteredSizesQuery->with(['size' => function ($query) {
            $query->select('id', 'size', 'units');
        }])->get(['size_id'])->pluck('size')->unique()->sort();

        $perPage = 20; // Number of items per page

        if (
            isset($sort) && $sort === 'low_to_high'
        ) {
            // Apply sorting for price low to high with a conditional join
            if (!empty($size)) {
                $products = $productsQuery->orderBy('price', 'asc')->paginate($perPage)->appends(request()->query());
            } else {
                $productsQuery = Product::select('products.*')
                    ->addSelect(\DB::raw('(SELECT MIN(price) FROM product_sizes WHERE product_sizes.product_id = products.id) as min_price'));

                $productsQuery->orderBy('min_price');

                if ($majorCategory) {
                    $productsQuery->whereHas('majorCategory', function ($query) use ($majorCategory) {
                        $query->where('slug', $majorCategory);
                    });
                }

                // Filter by minor category
                if ($minorCategory) {
                    $productsQuery->whereHas('minorCategory', function ($query) use ($minorCategory) {
                        $query->where('slug', $minorCategory);
                    });
                }

                // Filter by style
                if ($style) {
                    $productsQuery->whereHas('style', function ($query) use ($style) {
                        $query->where('slug', $style);
                    });
                }

                if (!empty($price)) {
                    // If $price is not empty, add a condition to filter by price range

                    $newPrice = explode(',', $price);

                    $productsQuery->where(function ($query) use ($newPrice, $priceRanges) {
                        foreach ($newPrice as $value) {
                            $rangeValues = $priceRanges[$value] ?? null;
                            if ($rangeValues) {
                                // Check if the value corresponds to a known range
                                list($minPrice, $maxPrice) = array_pad($rangeValues[0], 2, null);

                                if ($maxPrice !== null) {
                                    $query->orWhereHas('productSizes', function ($query) use ($minPrice, $maxPrice) {
                                        $query->whereBetween('price', [$minPrice, $maxPrice]);
                                    });
                                } else {
                                    // Use >= for a single value range
                                    $query->orWhereHas('productSizes', function ($query) use ($minPrice) {
                                        $query->where('price', '>=', $minPrice);
                                    });
                                }
                            }
                        }
                    });

                    $productsQuery->get();
                }

                if (!empty($abv)) {
                    // If $abv is not empty, add a condition to filter by ABV range

                    $newAbv = explode(',', $abv);

                    $productsQuery->where(function ($query) use ($newAbv, $abvRanges) {
                        foreach ($newAbv as $value) {
                            $rangeValues = $abvRanges[$value] ?? null;
                            if ($rangeValues) {
                                // Check if the value corresponds to a known range
                                if (count($rangeValues[0]) == 2) {
                                    $query->orWhereBetween('abv', $rangeValues);
                                } elseif (count($rangeValues[0]) == 1) {
                                    // Use >= for a single value range
                                    $query->orWhere('abv', '>=', $rangeValues[0][0]);
                                }
                            }
                        }
                    });

                    $productsQuery->get();
                }

                if (!empty($countries)) {
                    // If $countries is an array, use it directly
                    // If it's a string, convert it to an array
                    $countriesArray = is_array($countries) ? $countries : explode(',', $countries);
                    $productsQuery->whereIn('country_of_origin', $countriesArray);
                }

                $products = $productsQuery->paginate(20)->withQueryString();
            }
        } else if (isset($sort) && $sort === 'high_to_low') {
            // Apply sorting for price high to low with a conditional join
            if (!empty($size)) {
                $products = $productsQuery->orderBy('price', 'desc')->paginate($perPage)->appends(request()->query());
            } else {
                $productsQuery = Product::select('products.*')
                    ->addSelect(\DB::raw('(SELECT MAX(price) FROM product_sizes WHERE product_sizes.product_id = products.id) as max_price'));

                $productsQuery->orderBy('max_price', 'desc'); // Order by maximum price from high to low

                if ($majorCategory) {
                    $productsQuery->whereHas('majorCategory', function ($query) use ($majorCategory) {
                        $query->where('slug', $majorCategory);
                    });
                }

                // Filter by minor category
                if ($minorCategory) {
                    $productsQuery->whereHas('minorCategory', function ($query) use ($minorCategory) {
                        $query->where('slug', $minorCategory);
                    });
                }

                // Filter by style
                if ($style) {
                    $productsQuery->whereHas('style', function ($query) use ($style) {
                        $query->where('slug', $style);
                    });
                }

                if (!empty($price)) {
                    // If $price is not empty, add a condition to filter by price range

                    $newPrice = explode(',', $price);

                    $productsQuery->where(function ($query) use ($newPrice, $priceRanges) {
                        foreach ($newPrice as $value) {
                            $rangeValues = $priceRanges[$value] ?? null;
                            if ($rangeValues) {
                                // Check if the value corresponds to a known range
                                list($minPrice, $maxPrice) = array_pad($rangeValues[0], 2, null);

                                if ($maxPrice !== null) {
                                    $query->orWhereHas('productSizes', function ($query) use ($minPrice, $maxPrice) {
                                        $query->whereBetween('price', [$minPrice, $maxPrice]);
                                    });
                                } else {
                                    // Use >= for a single value range
                                    $query->orWhereHas('productSizes', function ($query) use ($minPrice) {
                                        $query->where('price', '>=', $minPrice);
                                    });
                                }
                            }
                        }
                    });

                    $productsQuery->get();
                }

                if (!empty($abv)) {
                    // If $abv is not empty, add a condition to filter by ABV range

                    $newAbv = explode(',', $abv);

                    $productsQuery->where(function ($query) use ($newAbv, $abvRanges) {
                        foreach ($newAbv as $value) {
                            $rangeValues = $abvRanges[$value] ?? null;
                            if ($rangeValues) {
                                // Check if the value corresponds to a known range
                                if (count($rangeValues[0]) == 2) {
                                    $query->orWhereBetween('abv', $rangeValues);
                                } elseif (count($rangeValues[0]) == 1) {
                                    // Use >= for a single value range
                                    $query->orWhere('abv', '>=', $rangeValues[0][0]);
                                }
                            }
                        }
                    });

                    $productsQuery->get();
                }

                if (!empty($countries)) {
                    // If $countries is an array, use it directly
                    // If it's a string, convert it to an array
                    $countriesArray = is_array($countries) ? $countries : explode(',', $countries);
                    $productsQuery->whereIn('country_of_origin', $countriesArray);
                }

                $products = $productsQuery->paginate(20)->withQueryString();
            }
        } else {
            // Default sorting by 'created_at' in descending order
            $products = $productsQuery->orderBy('created_at', 'desc')->paginate($perPage)->appends(request()->query());
        }

        return view('products.showWithFilters', [
            'majorCategory' => $majorCategoryModel,
            'majorCategories' => $majorCategories,
            'minorCategory' => $minorCategoryModel,
            'minorCategories' => $minorCategories,
            'style' => $styleModel,
            'styles' => $styles,
            'sizes' => $sizes,
            'filteredSizes' => $filteredSizes,
            'countries' => $countries,
            'price' => $price,
            'abv' => $abv,
            'availablePrices' => $filteredPriceRanges,
            'availableAbv' => $filteredAbvRanges,
            'size' => $size,
            'availableCountries' => $availableCountries,
            'region' => $region,
            'products' => $products,
            'sort' => $sort
        ]);
    }

    public function showSingle($majorCategory, $productName)
    {
        $productNameDecoded = urldecode(rawurldecode($productName));

        $product = Product::with(['majorCategory', 'minorCategory', 'style', 'productSizes'])
            ->where('name', $productNameDecoded)
            ->first();

        $size = request()->filled('size') ? request('size') : null;

        return view('products.showSingle', [
            'product' => $product,
            'size' => $size
        ]);
    }
}
