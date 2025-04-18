<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $title = 'Manage Users';
        $users = User::latest()->with('roles')->where('is_deleted', '0')->get();
//        $users = User::latest()
//            ->with('roles')
//            ->whereDoesntHave('roles', function ($query) {
//                $query->where('name', 'Admin'); // Admin role wale users ko exclude kar diya
//            })
//            ->get();
        return view('admin.user.index', compact('title', 'users'));
    }

    public function create()
    {
        $title = 'Create User';
        $userRole = Role::get();
        return view('admin.user.create', compact('title', 'userRole'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'address' => ['required', 'string', 'max:100'],
            'user_role' => ['required'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);
        $data = $request->except('password_confirmation');
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile-images/'), $filename);
            $data['profile_image'] = 'uploads/profile-images/' . $filename;
        }
        $user = User::create($data);
        $user->assignRole($request->input('user_role'));
        return redirect()->route('admin.manage.users')
            ->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $title = 'Edit User';
        $userRole = Role::get();
        $user = User::with('roles')->findOrFail($id);
        return view('admin.user.edit', compact('title', 'user', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:8',
            'address' => 'nullable|string|max:100',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        $user = User::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile-images/'), $filename);
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image));
            }
            $user->profile_image = 'uploads/profile-images/' . $filename;
        }
        $user->name = $request->name;
        $user->address = $request->address;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->syncRoles([$request->user_role]);
        return redirect()->route('admin.manage.users')
            ->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        $title = 'User Detail';
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('title', 'user'));
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
               'is_deleted' => '1',
               'is_active' => '0',
            ]);
            return response()->json(['success' => true, 'message' => 'Admin deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Admin not found'], 404);
        }
    }

}
