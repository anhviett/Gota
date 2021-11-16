<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = "tbl_product_sizes";
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
