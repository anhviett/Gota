<?php


namespace App\Http\Controllers\Site\Pages\ProductDetails;


use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductDetailController
{
    public function show(Request $request, $id){
        $product = Product::find($id);
        $product_category = Product::where('category_id', $product->id);
        $category = ProductCategory::where('name', $product_category);

        $product_categories = ProductCategory::all();
        $products = Product::all();
        $post = Post::all();
        $post_categories = PostCategory::orderBy('id', 'DESC')->get();
        $product_images = ProductImage::where('product_id', $product->id)->get();
        foreach ($products as $prod){
            $category_id = $prod->category_id;
        }

        $related = Product::where('category_id', $category_id)->whereNotIn('id', [$product->id])->get();
        foreach ($product_categories as $key => $value){
            $meta_desc = $value->description;
            $meta_keywords = $value->meta_keywords;
            $meta_title = $value->name;
            $meta_canonical = $request->url();
            $id = $value->id;
        }
        // Đếm số lượt xem sản phẩm
        $product->product_views = $product->product_views + 1;
        $product->save();
        return view('site.pages.product_details.index',compact('products', 'product_categories','product_images',
            'product', 'meta_desc', 'meta_keywords', 'post', 'post_categories', 'category', 'meta_title', 'meta_canonical',
        'product_category', 'related'))
            ;
    }
}
