<?php

namespace Database\Seeders;

use Attribute;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions= [
            // User permissions
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // news permissions
            'news.view',
            'news.create',
            'news.edit',
            'news.delete',

            // event permissions
            'event.view',
            'event.create',
            'event.edit',
            'event.delete',

            // Tutorial permissions
            'tutorial.view',
            'tutorial.create',
            'tutorial.edit',
            'tutorial.delete',

            // crop solutions permissions

            'cropsolution.view',
            'cropsolution.create',
            'cropsolution.edit',
            'cropsolution.delete',


            // Role & Permission management
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'permission.view',
            'permission.assign',

        ];

          foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

         // Create roles and assign permissions
          $superAdminRole = Role::create(['name' => 'Super Admin']);
        $superAdminRole->givePermissionTo(Permission::all());

        //assign the role to user
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $superAdminUser->assignRole($superAdminRole);




    }
}
