<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = config('roles.roles');

        foreach ($roles as $roleName => $role) {
            $createdRole = Role::firstOrCreate(['name' => $roleName]);
            $createdRole->syncPermissions([]);

            $lowerLevelRoles = array_filter($roles, function ($filterRole) use ($role) {
                return $filterRole['role_level'] <= $role['role_level'];
            });

            foreach ($lowerLevelRoles as $lowerLevelRole) {
                foreach ($lowerLevelRole['permissions'] as $permission) {
                    $createdRole->givePermissionTo(Permission::firstOrCreate(['name' => $permission]));
                }
            }
        }
    }
}
