<?php

namespace App\Http\Controllers\Backend\Menu;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::orderBy('id', 'DESC')->paginate(5);
        return view('admin.menu.index', compact('menus'));
    }
    public function create(){

        $html = getMenu($parent_id = 0);
        return view('admin.menu.create', compact( 'html'));
    }
    public function store(Request $request){
        $menus = new Menu();
        $menus->name = $request->input('inputName');
        $menus->slug = $request->input('inputSlug');
        $menus->order_number = $request->input('inputNumber');
        $menus->parent_id = $request->input('inputCategories');
        $menus->save();

        if($menus){
            return back()->with('success', 'Thêm thành công');
        }else{
            return back()->with('error', 'Thêm thất bại');
        }
    }
    public function update(Request $request, $id){
        $menus = Menu::find($id);
        $menus->name = $request->input('inputName');
        $menus->slug = $request->input('inputSlug');
        $menus->order_number = $request->input('inputNumber');
        $menus->parent_id = $request->input('inputCategories');
        $menus->save();
        if($menus){
            return back()->with('success', 'Sửa thành công');
        }else{
            return back()->with('error', 'Sửa thất bại');
        }
    }
    public function edit($id){
        $menus =  Menu::find($id);

        return view('admin.menu.edit', compact('menus'));

    }
    public function delete($id){
        Menu::destroy($id);
        return back()->with('success','Dữ liệu xóa thành công.');

    }

}
