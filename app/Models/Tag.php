<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tbl_tags";
    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggables');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggables');
    }
}
