<?php

namespace App\Http\Controllers\Backend\Products;


use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller

{
    public function index(){
        $product_categories = ProductCategory::orderBy('id', 'ASC')->paginate(5);
        return view('admin.products.product_categories.index', compact('product_categories'));
    }



    public function create(){
        $product_categories = ProductCategory::all();
        return view('admin.products.product_categories.create', compact('product_categories'));
    }

    public function store(Request $request){
        $product_categories = new ProductCategory();
        $product_categories->name = $request->input('inputName');
        $product_categories->meta_keywords = $request->input('inputMeta');
        $product_categories->slug = $request->input('inputSlug');
        $product_categories->save();

        if($product_categories){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $product_categories = ProductCategory::find($id);
        $product_categories->name = $request->input('inputName');
        $product_categories->meta_keywords = $request->input('inputMeta');
        $product_categories->slug = $request->input('inputSlug');
        $product_categories->save();
        if($product_categories){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $product_categories =  ProductCategory::find($id);
        return view('admin.products.product_categories.edit', compact('product_categories'));

    }
    public function delete($id){
        ProductCategory::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

}
