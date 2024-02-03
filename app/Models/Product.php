<?php

namespace App\Models;

use App\Models\Style;
use App\Models\ProductSize;
use App\Models\MajorCategory;
use App\Models\MinorCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'brand', 'description', 'country_of_origin', 'state', 'abv', 'gluten_free', 'non_alcoholic', 'major_category_id', 'minor_category_id', 'style_id'];

    // Relationships
    public function majorCategory()
    {
        return $this->belongsTo(MajorCategory::class);
    }

    public function minorCategory()
    {
        return $this->belongsTo(MinorCategory::class);
    }

    public function style()
    {
        return $this->belongsTo(Style::class);
    }


    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function defaultSize()
    {
        return $this->hasOne(ProductSize::class)->where('is_default_size', true);
    }
}
