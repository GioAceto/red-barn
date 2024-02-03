<?php

namespace App\Models;

use App\Models\Style;
use App\Models\Product;
use App\Models\MajorCategory;
use Illuminate\Database\Eloquent\Model;

class MinorCategory extends Model
{
    protected $fillable = ['name', 'slug', 'major_category_id'];

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function styles()
    {
        return $this->hasMany(Style::class);
    }

    public function majorCategory()
    {
        return $this->belongsTo(MajorCategory::class);
    }

    public function getMajorCategoryNameAttribute()
    {
        return $this->majorCategory->name ?? null;
    }
}
