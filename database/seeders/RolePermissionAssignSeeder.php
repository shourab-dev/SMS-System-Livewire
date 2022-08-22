<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class RolePermissionAssignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'shourab',
            'email' => 'shourab.cit.bd@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user2 = User::create([
            'name' => 'zahid',
            'email' => 'zahid.cit.bd@gmail.com',
            'password' => Hash::make('password'),
        ]);

        //*Assigning All PERMISSION TO SUPER-ADMIN ROLE
        $permissions = Permission::get();
        $superAdmin = Role::where('name', 'super-admin')->first();
        $superAdmin->syncPermissions($permissions);
        //*Assigning All PERMISSION TO SUPER-ADMIN ROLE ENDS



        //*ASSIGNING ROLE SUPER-ADMIN TO DEV

        $user1->assignRole('super-admin');
        $user2->assignRole('super-admin');
        //*ASSIGNING ROLE SUPER-ADMIN TO DEV ENDS
    }
}
