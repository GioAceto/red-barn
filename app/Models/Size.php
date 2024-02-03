<?php

namespace App\Models;

use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    protected $fillable = ['size', 'units'];

    public function productSize()
    {
        return $this->hasMany(ProductSize::class);
    }
}
