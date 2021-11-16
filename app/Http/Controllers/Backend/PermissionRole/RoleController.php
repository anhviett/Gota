<?php

namespace App\Http\Controllers\Backend\PermissionRole;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->permission = $permission;
    }
    public function index(){
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }
    public function create(){
        $roles = Role::all();
        $permission = Permission::all();
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.roles.create',compact('roles', 'permissionsParent', 'permission'));
    }
    public function store(Request $request){
        $roles = new Role();
        $roles->name = $request->role_name;
        $roles->display_name = $request->display_name;
        $roles->save();
        $permissionId = $request->permission_id;
        $roles->permissions()->attach($permissionId);
        return redirect()->route('role.index');
    }
    public function edit($id){
        $roles = Role::find($id);
        $permissionChecked = $roles->permissions;
        $permissionsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.roles.edit', compact('roles', 'permissionsParent', 'permissionChecked'));
    }
    public function update(Request $request,$id){
        $roles = Role::find($id);
        $roles->name = $request->role_name;
        $roles->display_name = $request->display_name;
        $roles->save();
        $permissionId = $request->permission_id;
        $roles->permissions()->sync($permissionId);
        return redirect()->route('role.index');
    }
    public function delete($id)
    {
        Role::destroy($id);
        return redirect()->route('role.index');
    }

    public function roleChangeStatus(Request $request){
        $roles = role::find($request->role_id);
        $roles->status = $request->status;
        $roles->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
