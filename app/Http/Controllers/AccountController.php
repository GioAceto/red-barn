<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Style;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\MajorCategory;
use App\Models\MinorCategory;

class AccountController extends Controller
{
    public function create()
    {
        if (!auth()->check()) {
            return redirect('/');
        }

        // Fetch unique brand names from the products table
        $brands = Product::distinct()->pluck('brand')->sort(SORT_NATURAL | SORT_FLAG_CASE);
        $majorCategories = MajorCategory::get()->sort(SORT_NATURAL | SORT_FLAG_CASE);
        $minorCategories = MinorCategory::get()->sort(SORT_NATURAL | SORT_FLAG_CASE);
        $styles = Style::get()->sort(SORT_NATURAL | SORT_FLAG_CASE);
        $sizes = Size::get()->sort(SORT_NATURAL | SORT_FLAG_CASE);

        return view('account.create', [
            'brands' => $brands,
            'majorCategories' => $majorCategories,
            'minorCategories' => $minorCategories,
            'styles' => $styles,
            'sizes' => $sizes
        ]);
    }
}
