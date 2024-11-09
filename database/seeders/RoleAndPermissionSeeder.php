<?php

// database/seeders/RoleAndPermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Créer des permissions
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage orders']);

        // Créer des rôles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assigner des permissions aux rôles
        $adminRole->givePermissionTo(['manage users', 'manage products', 'manage orders']);
    }
}