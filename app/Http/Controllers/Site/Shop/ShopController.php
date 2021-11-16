<?php

namespace App\Http\Controllers\Site\Shop;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Taggable;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
//        Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $products = Product::all();
        foreach ($products as $product){
            $slug = $product->category->slug;
        }

        $product_images = ProductImage::all();
        $product_categories = ProductCategory::all();
        $tags = Tag::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();
        $category = ProductCategory::where('slug', $slug)->first();
        $paginateProducts = Product::orderBy('id', 'DESC')->paginate(10);
        $post_categories = PostCategory::all();
        $posts = Post::all();

        return view('site.shop.index', compact('meta_desc', 'meta_title', 'meta_keywords', 'meta_canonical',
        'product_categories','product_images', 'products', 'colors','sizes', 'tags', 'paginateProducts', 'category',
        'posts', 'post_categories'));
    }
    public function show(Request $request, $slug){
//      Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $products = Product::all();
        $product_categories = ProductCategory::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();
        $tags = Tag::all();
        $category = ProductCategory::where('slug', $slug)->first();
        if (!is_object($category)) {
            abort(404);
        }
        $paginateProducts = Product::where('category_id', $category->id);
        // lọc theo size
        if ($request->has('sizes') && !empty($request->sizes)) {
            $product_ids = ProductSize::whereIn('size_id', $request->sizes)->pluck('product_id')->toArray();
        }
        //lọc theo color
        if ($request->has('colors') && !empty($request->colors)) {
            $product_ids = ProductColor::whereIn('color_id', $request->colors)->pluck('product_id')->toArray();
        }
        //lọc theo tag
        if ($request->has('tags') && !empty($request->tags)) {
            $product_ids = Taggable::whereIn('tag_id', $request->tags)->pluck('taggable_id')->toArray();
        }
        if (isset($product_ids) && !empty($product_ids)) {
            $paginateProducts = $paginateProducts->whereIn('id', $product_ids);
        }
        // lọc theo danh mục

        if ($request->has('sort') && $request->sort !='') {
            $paginateProducts = $paginateProducts->OrderByRaw($request->sort);
        } else {
            $paginateProducts = $paginateProducts->latest('id');
        }
        $paginateProducts = $paginateProducts->paginate(5);

        return view('site.shop.index', compact('meta_desc', 'meta_title', 'meta_keywords', 'meta_canonical',
            'product_categories', 'products', 'sizes', 'colors', 'paginateProducts', 'category','tags'
       ));
    }

    public function show_category(Request $request, $slug){
//      Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $category = ProductCategory::where('slug', $slug)->first();
        $paginateProducts = Product::where('category_id', $category->id);
        if (!is_object($category)) {
            abort(404);
        }
        $product_categories = ProductCategory::all();
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();
        $tags = Tag::all();
        $product_images = ProductImage::all();
        $post_categories = PostCategory::all();
        // lọc theo size
        if ($request->has('sizes') && !empty($request->sizes)) {
            $product_ids = ProductSize::whereIn('size_id', $request->sizes)->pluck('product_id')->toArray();
        }
        //lọc theo color
        if ($request->has('colors') && !empty($request->colors)) {
            $product_ids = ProductColor::whereIn('color_id', $request->colors)->pluck('product_id')->toArray();
        }
        //lọc theo tag
        if ($request->has('product_tags') && !empty($request->tags)) {
            $product_ids = Taggable::whereIn('tag_id', $request->tags)->pluck('product_id')->toArray();
        }
        if (isset($product_ids) && !empty($product_ids)) {
            $paginateProducts = $paginateProducts->whereIn('id', $product_ids);
        }
        // lọc theo danh mục

        if ($request->has('sort') && $request->sort !='') {
            $paginateProducts = $paginateProducts->OrderByRaw($request->sort);
        } else {
            $paginateProducts = $paginateProducts->latest('id');
        }
        $paginateProducts = $paginateProducts->paginate(5);

        return view('site.shop.product_categories.show_product_category', compact('meta_desc', 'meta_title', 'meta_keywords', 'meta_canonical',
            'product_categories' ,'products', 'tags', 'category', 'colors', 'sizes', 'paginateProducts',
        'product_images', 'post_categories'));
    }

    /*-------------***************------------------*/
    public function show_tag(Request $request, $slug){
//      Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $tags = Tag::all();
        $category = Tag::where('slug', $slug)->first();
        $tag = Taggable::where('tag_id', $category->id)->pluck('taggable_id');
        $paginateProducts = Product::whereIn('id', $tag);
        if (!is_object($tags)) {
            abort(404);
        }
        $product_categories = ProductCategory::all();
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();
        $product_images = ProductImage::all();
        $post_categories = PostCategory::all();
        // lọc theo size
        if ($request->has('sizes') && !empty($request->sizes)) {
            $product_ids = ProductSize::whereIn('size_id', $request->sizes)->pluck('product_id')->toArray();
        }
        //lọc theo color
        if ($request->has('colors') && !empty($request->colors)) {
            $product_ids = ProductColor::whereIn('color_id', $request->colors)->pluck('product_id')->toArray();
        }
        //lọc theo tag
        if ($request->has('product_tags') && !empty($request->tags)) {
            $product_ids = Taggable::whereIn('tag_id', $request->tags)->pluck('product_id')->toArray();
        }
        if (isset($product_ids) && !empty($product_ids)) {
            $paginateProducts = $paginateProducts->whereIn('id', $product_ids);
        }
        // lọc theo danh mục

        if ($request->has('sort') && $request->sort !='') {
            $paginateProducts = $paginateProducts->OrderByRaw($request->sort);
        } else {
            $paginateProducts = $paginateProducts->latest('id');
        }
        $paginateProducts = $paginateProducts->paginate(5);

        return view('site.shop.product_tags.show_product_tag', compact('meta_desc', 'meta_title', 'meta_keywords', 'meta_canonical',
            'product_categories' ,'products', 'tags', 'colors', 'sizes', 'paginateProducts', 'category',
            'product_images', 'post_categories'));
    }

    public function show_category_detail(Request $request, $slug, $id){
        //      Seo
        $meta_desc = "Bán đồ các kiểu ";
        $meta_keywords = "Quần áo, dụng cụ thol store, trang bị thể hình, quần áo gym, thực phẩm bổ sung";
        $meta_title = "Thực phẩm, đồ dùng, quần áo các thứ";
        $meta_canonical = $request->url();
//      End Seo
        $category = ProductCategory::where('slug', $slug)->first();
        $paginateProducts = Product::where('category_id', $category->id);
        if (!is_object($category)) {
            abort(404);
        }

        $product = Product::find($id);
        $product_images = ProductImage::where('product_id', $product->id);
        $post_categories = PostCategory::all();
        $product_categories = ProductCategory::all();
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::orderBy('id', 'DESC')->take(10)->get();
        $tags = Tag::all();
//        $images = ProductImage::where('product_id', $product->id);
        $product_images = ProductImage::all();

        // lọc theo size
        if ($request->has('sizes') && !empty($request->sizes)) {
            $product_ids = ProductSize::whereIn('size_id', $request->sizes)->pluck('product_id')->toArray();
        }
        //lọc theo color
        if ($request->has('colors') && !empty($request->colors)) {
            $product_ids = ProductColor::whereIn('color_id', $request->colors)->pluck('product_id')->toArray();
        }
        //lọc theo tag
        if ($request->has('product_tags') && !empty($request->tags)) {
            $product_ids = Taggable::whereIn('tag_id', $request->tags)->pluck('product_id')->toArray();
        }
        if (isset($product_ids) && !empty($product_ids)) {
            $paginateProducts = $paginateProducts->whereIn('id', $product_ids);
        }
        // lọc theo danh mục

        if ($request->has('sort') && $request->sort !='') {
            $paginateProducts = $paginateProducts->OrderByRaw($request->sort);
        } else {
            $paginateProducts = $paginateProducts->latest('id');
        }
        $paginateProducts = $paginateProducts->paginate(5);

        return view('site.shop.product_categories.show_product_category', compact('meta_desc', 'meta_title', 'meta_keywords', 'meta_canonical',
            'product_categories' ,'products', 'tags', 'category', 'colors', 'sizes', 'paginateProducts',
            'product_images', 'post_categories'));
    }
}
