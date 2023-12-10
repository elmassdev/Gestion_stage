<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user and assign 'admin' role
        $admin = User::create([
            'name' => 'Abdelaadim EL MASSOUDI ',
            'email' => 'abdelaadim.elmassoudi@ocpgroup.ma',
            'site'=>'Benguerir',
            'password' => Hash::make('testtest'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        $admin = User::create([
            'name' => 'Younes ED-DHHAK',
            'email' => 'EDDHHAK@gmail.com',
            'site'=>'Benguerir',
            'password' => Hash::make('testtest'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        $admin = User::create([
            'name' => 'Youness Kourimi ',
            'email' => 'kourimi@ocpgroup.ma',
            'site'=>'Youssoufia',
            'password' => Hash::make('testtest'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        // Create editor user and assign 'editor' role
        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'site'=>'Benguerir',
            'password' => Hash::make('editortest'),
        ]);
        $editorRole = Role::where('name', 'editor')->first();
        $editor->assignRole($editorRole);

        // Create student user and assign 'student' role
        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'site'=>'Benguerir',
            'password' => Hash::make('studenttest'),
        ]);
        $studentRole = Role::where('name', 'student')->first();
        $student->assignRole($studentRole);

        // Create regular user and assign 'user' role
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'site'=>'Benguerir',
            'password' => Hash::make('usertest'),
        ]);
        $userRole = Role::where('name', 'user')->first();
        $regularUser->assignRole($userRole);
    }
}
