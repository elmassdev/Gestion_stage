<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
    Role::create(['name' => 'superadmin']);
    Role::create(['name' => 'admin']);
    Role::create(['name' => 'manager']);
    Role::create(['name' => 'encadrant']);
    Role::create(['name' => 'surete']);
    Role::create(['name' => 'accueil']);

    // Create permissions
    Permission::create(['name' => 'manage_users']);
    Permission::create(['name' => 'crud_stagiaires']);
    Permission::create(['name' => 'approve_requests']);
    Permission::create(['name' => 'approve_FFS']);
    Permission::create(['name' => 'view_indicators']);
    Permission::create(['name' => 'view_surete_page']);
    Permission::create(['name' => 'fill_forms']);
    Permission::create(['name' => 'view_stagiaires_in_service']);

    // Assign permissions to roles
    Role::findByName('superadmin')->givePermissionTo('manage_users', 'crud_stagiaires', 'view_indicators','approve_FFS', 'view_surete_page', 'fill_forms', 'view_stagiaires_in_service');
    Role::findByName('admin')->givePermissionTo('crud_stagiaires');
    Role::findByName('manager')->givePermissionTo('view_indicators','approve_requests');
    Role::findByName('encadrant')->givePermissionTo('approve_FFS','approve_requests');
    Role::findByName('surete')->givePermissionTo('view_surete_page');
    Role::findByName('accueil')->givePermissionTo('fill_forms', 'view_stagiaires_in_service');
    }
}
