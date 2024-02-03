<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSize extends Model
{
    protected $fillable = ['product_id', 'sku', 'size_id', 'is_default_size', 'price', 'allocated', 'deal', 'deal_price', 'special', 'special_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
