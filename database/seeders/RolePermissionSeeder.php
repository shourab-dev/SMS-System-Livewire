<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**=============================
     * *Roles STARTS HERE*
    ===============================*/
    public function run()
    {
        // *Role for super-admin

        Role::create(
            [
                'name' => 'super-admin',
                'guard_name' => 'web',
                'module_id' => null,
            ]
        );
        // *Role for super-admin ends

        //*DIRECTOR MODULE
        $directorModuleRoles = [
            'director',
            'chairman'
        ];
        foreach ($directorModuleRoles as $drRole) {
            Role::create(
                [
                    'name' => $drRole,
                    'guard_name' => 'web',
                    'module_id' => 1,
                ]
            );
        }
        //*DIRECTOR MODULE ENDS

        //*PRINCIPLE MODULE 
        $principleModuleRoles = [
            'principal',
            'vice principal'
        ];
        foreach ($principleModuleRoles as $prModuleRole) {
            Role::create(
                [
                    'name' => $prModuleRole,
                    'guard_name' => 'principal',
                    'module_id' => 2,
                ]
            );
        }
        //*PRINCIPLE MODULE ENDS



        /**=============================
         * *PERMISSION STARTS HERE*
         ===============================*/

        //*PERMISSION FOR DIRECTOR
        $directorsPermissions = [
            ['role permission', 'Edit Role & Assign Permission'],
            ['branch manage', 'Manage Multiple Branches'],
            ['register user', 'Can register a user'],
            ['ban user', 'Can ban a user'],
        ];
        foreach ($directorsPermissions as $drPermission) {
            Permission::create(
                [
                    'name' => $drPermission[0],
                    'guard_name' => 'web',
                    'section_id' => 1,
                    'detail' => $drPermission[1]
                ]
            );
        }

        //*PERMISSION FOR DIRECTOR ENDS
    }
}
