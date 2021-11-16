<?php

namespace App\Http\Controllers\Site\Services;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request){
        //Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
        //End Seo
        $product_categories = ProductCategory::all();
        $post_categories = PostCategory::all();
        return view('site.services.index', compact('meta_desc', 'meta_keywords', 'meta_title', 'meta_canonical',
        'product_categories', 'post_categories'));
    }
}
