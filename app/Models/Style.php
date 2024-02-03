<?php

namespace App\Models;

use App\Models\Product;
use App\Models\MinorCategory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ['name', 'slug', 'minor_category_id'];

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function minorCategory()
    {
        return $this->belongsTo(MinorCategory::class);
    }
}
