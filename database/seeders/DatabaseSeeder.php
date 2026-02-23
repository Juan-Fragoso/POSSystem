<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       // 1. Limpiar la caché de Spatie
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Ejecutar la creación en orden
        $this->createModules();
        $this->createPermissions();
        $this->createRoles();
    }

    private function createModules()
    {
        $modules = [
            ['name' => 'Productos', 'code' => 'products'],
            ['name' => 'Ventas',    'code' => 'sales'],
        ];

        foreach ($modules as $module) {
            Module::updateOrCreate(['code' => $module['code']], $module);
        }
    }

    private function createPermissions()
    {
        $permissions = [
            'products.index', 'products.create', 'products.edit', 'products.delete',
            'sales.index', 'sales.create', 'sales.edit', 'sales.delete',
        ];

        foreach ($permissions as $permissionName) {
            $moduleCode = explode('.', $permissionName)[0];
            $module = Module::where('code', $moduleCode)->first();

            Permission::updateOrCreate(
                ['name' => $permissionName],
                [
                    'name' => $permissionName,
                    'module_id' => $module->id,
                    'guard_name' => 'web' // Spatie lo requiere
                ]
            );
        }
    }

    private function createRoles()
    {
        // Crear Rol Administrador
        $adminRole = Role::updateOrCreate(['name' => 'Administrador'], ['guard_name' => 'web']);

        // Darle todos los permisos existentes al Admin
        $adminRole->syncPermissions(Permission::all());

        // Crear el usuario Admin (solo si no existe)
        $this->createUser($adminRole);

        // Crear otros roles
        $roles = [
            ['name' => 'Vendedor'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], ['guard_name' => 'web']);
        }
    }

    private function createUser($role)
    {
        // Usamos updateOrCreate para evitar duplicados al re-ejecutar el seeder
        $user = User::updateOrCreate(
            ['email' => 'admin@jf.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole($role);
    }
}
