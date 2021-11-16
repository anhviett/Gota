<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\Size;
use App\Models\Style;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $products = Product::orderBy('category_id', 'DESC')->paginate(4);
        return view("admin.products.index",compact('products'));
    }


    public function create(){
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();
        $product_tags = Tag::all();
        $product_images = ProductImage::all();

        $html = getProductCategory($parent_id = 0);
        return view("admin.products.create", compact('products',  'html', 'colors', 'sizes',
        'product_tags', 'product_images'));


    }


    public function store(Request $request){
        $products = new Product();
        if($request->hasFile('avatar_product')){                ;
            $img_path = saveFile($request->file('avatar_product'), 'avatar_product/' . date('Y/m/d'));
            $products->inputAvatar = $img_path;
        }
        $products->name = $request->input('inputName');
        $products->description = $request->input('inputDescription');
        $products->base_price =$request->input('inputBasePrice');
        $products->discount_price =$request->input('inputDiscountPrice');
        $products->content = $request->input('inputContent');
        $products->status = $request->input('inputStatus');
        $products->category_id = $request->inputCategories;
        $products->save();
        if ($request->hasFile('inputAvatar')){
            $image_src = saveFile($request->file('inputAvatar'), 'products/' . date('Y/m/d'));
            $products->avatar = $image_src;
            $products->save();
        }


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $img_path = saveFile($file, 'products/' . date('Y/m/d'));
                $product_images = new ProductImage();
                $product_images->product_id = $products->id;
                $product_images->path = $img_path;
                $product_images->save();
            }
        } else {
            if ($request->get('delete_img') == 1) {
                ProductImage::where('product_id', $products->id)->delete();
            }
        }

        $products->sizes()->sync($request->inputSizes);
        $products->colors()->sync($request->inputColors);
        $products->tags()->sync($request->tags);

        if ($products) {
            return back()->with('success', 'Tạo thành công');
        } else {
            return back()->with('error', 'Tạo thất bại');
        }

    }

    public function show($id){
    }

    public function update(Request $request,$id){
        $products = Product::find($id);

        if($request->hasFile('avatar_product')){                ;
            $img_path = saveFile($request->file('avatar_product'), 'avatar_product/' . date('Y/m/d'));
            $products->inputAvatar = $img_path;
        }
        $products->name = $request->input('inputName');

        $products->description = $request->input('inputDescription');
        $products->base_price =$request->input('inputBasePrice');
        $products->discount_price =$request->input('inputDiscountPrice');
        $products->content = $request->input('inputContent');
        $products->status = $request->input('inputStatus');
        $products->category_id = $request->inputCategories;

        if ($request->hasFile('inputAvatar')){
            $image_src = saveFile($request->file('inputAvatar'), 'products/' . date('Y/m/d'));
            $products->avatar = $image_src;
        }
        if ($request->hasFile('images')) {
            ProductImage::where('product_id', $products->id)->delete();
            foreach ($request->file('images') as $file) {
                $img_path = saveFile($file, 'products/' . date('Y/m/d'));
                $product_images = new ProductImage();
                $product_images->product_id = $products->id;
                $product_images->path = $img_path;
                $product_images->save();
            }
        } else {
            if ($request->get('delete_img') == 1) {
                ProductImage::where('product_id', $products->id)->delete();
            }
        }
        $products->sizes()->sync($request->inputSizes);
        $products->colors()->sync($request->inputColors);
        $products->tags()->sync($request->tags);


        if ($products) {

            return back()->with('success', 'Sửa thành công');
        } else {
            return back()->with('error', 'Sửa thất bại');
        }

    }

    public function edit($id)
    {
        $products = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $product_tags = Tag::all();
        $product_images = ProductImage::all();
        $html =  getProductCategory($products->category_id);
        return view("admin.products.edit", compact('products',  'colors', 'sizes', 'html', 'product_tags', 'product_images'));
    }


    public function delete($id){
        Product::destroy($id);
        return back()->with('success', 'Xóa sản phẩm thành công');
    }
    public function productChangeStatus(Request $request){
        $products = Product::find($request->product_id);
        $products->status = $request->status;
        $products->save();

        return response()->json(['success'=>'Status change successfully.']);
    }



}
