<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolePermissionsSeeder extends Seeder
{




    public function run(): void
    {
        $admin = User::create([
            'first_name' => 'Ahmed',
            'last_name' => 'Ansari',
            'slug' => Str::slug('Ahmed' . '_' . 'Ansari'),
            'email' => 'admin@example.com',
            'phone' => '+12345678912',
            'status' => true,
            'password' => bcrypt('password'),
        ]);
        // Create roles
        $role = Role::create(
            [
                'name' => 'Admin',
                'guard_name' => 'web',
            ],

        );

        $vendorRole= Role::create(
            [
                'name' => 'Vendor',
                'guard_name' => 'web',
            ],
        );
        $userRole= Role::create(
            [
                'name' => 'User',
                'guard_name' => 'web',
            ],
        );

        // Define permissions
        $permissionsList = [
            'products-show',
            'products-create',
            'products-edit',
            'products-delete',

            'roles-show',
            'roles-create',
            'roles-edit',
            'roles-delete',

            'users-show',
            'users-create',
            'users-edit',
            'users-delete',
        ];

        // Create permissions
        foreach ($permissionsList as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Assign permissions to roles
        $permissions = Permission::all();
        $role->permissions()->sync($permissions->pluck('id'));

        // Assign the 'Admin' role to the created user
        $admin->roles()->sync([$role->id]);
    }
}
