<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::orderBy('id', 'ASC')->paginate(5);
        return view('admin.products.colors.index', compact('colors'));
    }
    public function create(){
        $colors = Color::all();
        return view('admin.products.colors.create', compact('colors'));
    }
    public function store(Request $request){
        $colors = new Color();
        $colors->name = $request->input('inputName');
        $colors->slug = $request->input('inputSlug');
        $colors->save();
        if($colors){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $colors = Color::find($id);
        $colors->name = $request->input('inputName');
        $colors->slug = $request->input('inputSlug');
        $colors->save();
        if($colors){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $colors =  Color::all()->find($id);
        return view('admin.products.colors.edit', compact('colors'));

    }
    public function delete($id){
        Color::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

}
