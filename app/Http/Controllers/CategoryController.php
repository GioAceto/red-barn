<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;
use App\Models\MajorCategory;
use App\Models\MinorCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{

    public function showWithFilters($majorCategory)
    {
        $majorCategoryModel = MajorCategory::where('slug', $majorCategory)->first();

        if (!$majorCategoryModel) {
            // Handle the case where the major category is not found
            return abort(404);
        }

        $products = $majorCategoryModel->products()->with('productSizes')->get();

        return view('products.showWithFilters', [
            'majorCategory' => $majorCategoryModel,
            'products' => $products
        ]);
    }
}
