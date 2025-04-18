<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title = 'Manage Roles';
        $roles = Role::with('permissions')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.roles.index', compact('roles', 'title'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $title = 'Create Role';
        $permission = Permission::get();
        return view('admin.roles.create', compact('permission', 'title'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);

        $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name');
        $role->syncPermissions($permissions);

        return redirect()->route('admin.manage.roles')->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        $title = 'Show Role';
        $role = Role::findOrFail($id);
        $rolePermissions = $role->permissions;
        return view('admin.roles.show', compact('role', 'rolePermissions', 'title'));
    }

    public function edit($id)
    {
        $title = 'Edit Role';
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions', 'title'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permission' => 'required|array',
        ]);
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->input('name')]);
        $permissions = Permission::whereIn('id', $request->input('permission'))->pluck('name')->toArray();
        $role->syncPermissions($permissions);
        return redirect()->route('admin.manage.roles')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['success' => true, 'message' => 'Role deleted successfully']);
    }
}
