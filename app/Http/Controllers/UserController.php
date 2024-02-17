<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

Paginator::useBootstrap();

class UserController extends Controller
{
    public function show()
    {
        $roles = Role::all();
        $users = User::with('roles')
        ->join('services', 'users.service', '=', 'services.id')
        ->select('users.*', 'services.sigle_service as sigle')
        ->orderBy('users.nom', 'desc')
        ->paginate(10);

        return view('user.assignRoles', compact('roles','users'));
    }

    public function assignRoles(Request $request)
    {
        $roles = Role::all();
        $users = User::all();
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
        ]);
        $user = User::findOrFail($request->input('user_id'));
        $user->syncRoles($request->input('roles'));
        return redirect()->back()->with('success', 'Roles assigned successfully');
    }

    public function showPermissions()
    {
        $users = User::all();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('user.assignPermissions', compact('roles', 'users', 'permissions'));
    }

    public function assignPermissions(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);
        $role = Role::findOrFail($request->input('role_id'));
        $role->syncPermissions($request->input('permissions'));
        return redirect()->back()->with('success', 'Permissions assigned successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé');
    }


}
