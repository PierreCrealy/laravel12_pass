<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create roles
        $roleAdmin  = Role::create(['name' => 'Admin' ,'guard_name'=> 'web']);
        $roleLambda = Role::create(['name' => 'Lambda','guard_name'=> 'web']);


        //Permission
        //USER
        $permissionCreateUser = Permission::create(['name' => 'create-user','guard_name'=> 'web']);
        $permissionReadUser   = Permission::create(['name' => 'read-user'  ,'guard_name'=> 'web']);
        $permissionUpdateUser = Permission::create(['name' => 'update-user','guard_name'=> 'web']);
        $permissionDeleteUser = Permission::create(['name' => 'delete-user','guard_name'=> 'web']);

        //assign permissions to each role

        $roleAdmin->givePermissionTo([
            //user
            $permissionCreateUser, $permissionReadUser, $permissionUpdateUser, $permissionDeleteUser
        ]);

        $roleLambda->givePermissionTo([
            //user
           $permissionReadUser
        ]);



        // Give role to specific User
        User::find(1)->assignRole($roleAdmin);



    }
}
