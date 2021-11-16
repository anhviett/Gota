<?php

namespace App\Http\Controllers\Site\Pages\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, $slug){
        //Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
        //End Seo
        $products = Product::all();
        $product_categories = ProductCategory::all();
        $post_categories = PostCategory::all();
        $category = ProductCategory::where('slug', $slug);
        $posts = Post::all();
        return view('site.blog.index', compact('meta_title', 'meta_keywords', 'meta_canonical', 'meta_desc',
        'product_categories', 'post_categories', 'posts', 'category', 'products'
        ));
    }

    public function show(Request $request, $slug){
        //Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
        //End Seo
        $products = Product::all();
        $product_categories = ProductCategory::all();
        $post_categories = PostCategory::all();
        $category = PostCategory::where('slug', $slug)->first();
        $posts =Post::all();
        if (!is_object($category)) {
            abort(404);
        }
        $paginatePost = Post::where('category_id', $category->id)->take(1)->get();
        foreach ($paginatePost as $key => $value){
            $meta_desc = $value->description;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->title;
            $id = $value->id;
            $meta_canonical = $request->url();
        }
        foreach ($posts as $post){
            $category_id = $post->category_id;
        }
        $post_related = Post::where('category_id', $category_id)->get();

        $post = Post::where('id', $id)->first();
        // Đếm số lượt xem bài viết
        $post->post_views = $post->post_views + 1;
        return view('site.blog.blog_details', compact('meta_title', 'meta_keywords', 'meta_canonical', 'meta_desc',
            'product_categories', 'post_categories', 'posts', 'category', 'paginatePost', 'post_related', 'products'
        ));
    }
}
