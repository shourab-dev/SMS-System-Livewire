<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function render()
    {
        //*Render ALl Roles and Permissions

        $adminRoles = Role::where('name', '!=', 'super-admin')->where('guard_name', 'web')->toBase()->get();
        $principleRoles = Role::where('guard_name', 'principal')->toBase()->get();
        $roles = Role::where('name', '!=', 'super-admin')->get();
        $roles = collect($roles)->groupBy('guard_name');

        // dd($roles);
        return view('admin.permission.rolePermission', compact('roles'));
    }

    public function edit($id)
    {
        //*EDIT SPECIFIC ROLE AND PERMISSION
        $role = Role::with(['permissions' => function ($q) {
            $q->select('id');
        }])->findOrFail($id);
        $hasPermissions = collect($role->permissions)->pluck('id');
        // dd($hasPermissions->search(2));
        $permissions = Permission::select('id', 'name', 'detail')->where('guard_name', $role->guard_name)->get();
        return view('admin.permission.editPermissions', compact('role', 'permissions', 'hasPermissions'));
    }

    public function update(Request $request, $id)
    {
        //*UPDATE SPECIFIC PERMISSION OF A ROLE
        $role = Role::findOrFail($request->roleId);
        $role->name = $request->roleName;
        $role->save();
        $role->syncPermissions($request->permission);
        return back();
    }
}
