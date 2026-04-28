<?php

// app/Http/Controllers/Admin/PermissionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        // Retrieve all roles and permissions
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('roles', 'permissions'));
    }

    public function assignRoles(Request $request, $userId)
    {
        // Logic to assign roles to a user
    }

    public function assignPermissions(Request $request, $roleId)
    {
        // Logic to assign permissions to a role
    }
}
