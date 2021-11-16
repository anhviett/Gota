<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        //        Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $search = $request->input('search');
        $paginateProducts = Product::where('name', 'like', '%' . $search . '%')->orWhere('content', 'like', '%' . $search . '%')->paginate(5);

        $category = ProductCategory::where('id', $paginateProducts->pluck('category_id'))->first();
        if (!is_object($category)) {
            abort(404);
        }
        $products = Product::all();
        $product_images = ProductImage::all();
        $product_categories = ProductCategory::all();
        $post_categories = PostCategory::all();
        $posts = Post::all();
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();

            return view('site.home.search_results.index', compact('meta_desc', 'meta_canonical', 'meta_keywords', 'meta_title',
            'product_categories', 'products', 'product_images', 'paginateProducts', 'colors', 'tags', 'sizes', 'category', 'posts', 'post_categories',
        'search'));
    }

    public function post_search(Request $request){

        //        Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $search = $request->input('query');
        $paginatePosts = Post::where('title', 'like', '%' . $search . '%')->orWhere('summary', 'like', '%' . $search . '%')->paginate(5);

        $category = PostCategory::where('id', $paginatePosts->pluck('category_id'))->first();
        if (!is_object($category)) {
            abort(404);
        }
        $products = Product::all();
        $product_images = ProductImage::all();
        $product_categories = ProductCategory::all();
        $post_categories = PostCategory::all();
        $posts = Post::all();
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();
        foreach ($posts as $post){
            $category_id = $post->category_id;
        }
        $post_related = Post::where('category_id', $category_id)->get();
        return view('site.home.search_results.post', compact('meta_desc', 'meta_canonical', 'meta_keywords', 'meta_title',
            'product_categories', 'products', 'product_images', 'paginatePosts', 'colors', 'posts', 'sizes', 'category', 'post_categories', 'tags',
            'search', 'post_related'));
    }

    public function autocomplete(Request $request){
        $data = $request->all();

        if ($data['query']){
            $product = Product::where('name', 'like', '%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu d-block position-relative" style="top: -1px">';
            foreach ($product as $prod){
                $output .= '
                <li class="li_search_ajax" style="padding: 5px">
                    <a href="#"> '. $prod->name .' </a>
                </li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


}
