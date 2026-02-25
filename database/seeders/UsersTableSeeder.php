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
        $SuperAdmin = User::create([
            'titre'=>'M.',
            'nom'=>'EL MASSOUDI',
            'prenom' => 'Abdelaadim',
            'email' => 'abdelaadim.elmassoudi@ocpgroup.ma',
            'site'=>'Benguerir',
            'service'=>55,
            'password' => Hash::make('testtest'),
        ]);
        $SuperAdminRole = Role::where('name', 'superadmin')->first();
        $SuperAdmin->assignRole($SuperAdminRole);

        $admin = User::create([
            'titre'=>'M.',
            'nom' => 'ED-DHHAK',
            'prenom'=>'Younes',
            'email' => 'EDDHHAK@ocpgroup.ma',
            'site'=>'Benguerir',
            'service'=>55,
            'password' => Hash::make('testtest'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        $admin = User::create([
            'titre'=>'M.',
            'nom' => 'Kourimi',
            'prenom'=>'Younes',
            'email' => 'kourimi@ocpgroup.ma',
            'site'=>'Youssoufia',
            'service'=>56,
            'password' => Hash::make('testtest'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        $admin = User::create([
            'titre'=>'Mme',
            'nom' => 'KHOMRI',
            'prenom'=>'Es-saadia',
            'email' => 'KHOMRI@ocpgroup.ma',
            'site'=>'Benguerir',
            'service'=> 55,
            'password' => Hash::make('testtest'),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);
    }
}
