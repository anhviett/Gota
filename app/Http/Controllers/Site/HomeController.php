<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Banar;
use App\Models\Brand;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Slider;
use App\Models\Style;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request){
        //Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
        //End Seo
        $products = Product::take(5)->get();
        $paginateProducts = Product::all();
        $banars = Banar::all();
        $product_categories = ProductCategory::all();
        $post_categories = PostCategory::all();
        $posts = Post::all();
        $product_images = ProductImage::all();
        return view('site.home.index', compact('meta_desc', 'meta_keywords', 'meta_title', 'meta_canonical',
            'banars','products' , 'product_categories', 'paginateProducts', 'post_categories', 'posts', 'product_images'
        ));
    }
}
