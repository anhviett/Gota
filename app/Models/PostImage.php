<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;
    protected $table = "tbl_post_images";
    public function post(){
        return $this->belongsTo(Product::class, 'post_id');
    }
}
