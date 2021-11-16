<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $product_tags = Tag::orderBy('id', 'ASC')->paginate(5);
        return view('admin.products.product_tags.index', compact('product_tags'));
    }
    public function create(){
        $product_tags = Tag::all();
        return view('admin.products.product_tags.create', compact('product_tags'));
    }
    public function store(Request $request){
        $product_tags = new Tag();
        $product_tags->name = $request->input('inputName');
        $product_tags->slug = $request->input('inputSlug');
        $product_tags->save();

        if($product_tags){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $product_tags = Tag::find($id);
        $product_tags->name = $request->input('inputName');
        $product_tags->slug = $request->input('inputSlug');
        $product_tags->save();
        if($product_tags){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $product_tags =  Tag::all()->find($id);
        return view('admin.products.product_tags.edit', compact('product_tags'));

    }
    public function delete($id){
        Tag::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }
}
