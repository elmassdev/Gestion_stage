<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Abdelaadim EL MASSOUDI ',
            'email' => 'abdelaadim.elmassoudi@ocpgroup.ma',
            'site'=>'Benguerir',
            'password' => Hash::make('testtest'),
        ]);
    }
}
