<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = "tbl_product_colors";
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
