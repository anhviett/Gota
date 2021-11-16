<?php

namespace App\Http\Controllers\Backend\PermissionRole;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id', 'ASC')->paginate(50);
        return view('admin.permissions.index', compact('permissions'));
    }
    public function create(){

        $permissions = Permission::all();
        return view('admin.permissions.create', compact(  'permissions'));
    }
    public function store(Request $request)
    {
        $permissions = new Permission();
        $permissions->name = $request->input('module_parent');
        $permissions->display_name = $request->input('module_parent');
        $permissions->parent_id = 0;
        $permissions->save();

        foreach ($request->moduleChildren as $children) {
            Permission::create([
                'name' => $children,
                'display_name' => $children,
                'parent_id' => $permissions->id,
                'description' => $request->module_parent . '_' . $children
            ]);
        }

        return back()->with('success', 'Thêm thành công');
    }
    public function edit($id){
        $permissions = Permission::find($id);
        return view('admin.permissions.edit', compact('permissions'));
    }
    public function update(Request $request,$id){
        $permissions = Permission::find($id);
        $permissions->name = $request->input('module_parent');
        $permissions->display_name = $request->input('module_parent');
        $permissions->parent_id = 0;
        $permissions->save();
        foreach ($request->moduleChildren as $children) {
            Permission::update([
                'name' => $children,
                'display_name' => $children,
                'parent_id' => $permissions->id,
                'description' => $request->module_parent . '_' . $children
            ]);

        }
        return back()->with('success', 'Sửa thành công');
    }
    public function delete($id){
        Permission::destroy($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
