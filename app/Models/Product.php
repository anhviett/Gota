<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_products';
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'tbl_product_sizes', 'product_id', 'size_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'tbl_product_colors', 'product_id', 'color_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
