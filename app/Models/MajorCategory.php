<?php

namespace App\Models;

use App\Models\Product;
use App\Models\MinorCategory;
use Illuminate\Database\Eloquent\Model;

class MajorCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function minorCategories()
    {
        return $this->hasMany(MinorCategory::class);
    }
}
