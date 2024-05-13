<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $superadmin = Role::create(['name' => 'superadmin']); //Acceso a Todo | Admin Acceso a solo Inventario.
        $operador = Role::create(['name' => 'operador']); //Solo administrar inventario
        $invitado = Role::create(['name' => 'invitado']); //Solo visualizar

        // Permiso - Para entrar a la página de Usuarios
        Permission::create(['name' => 'users.index'])->assignRole($superadmin);
        // Permiso para ver el inventario
        Permission::create(['name' => 'dashboard'])->syncRoles([$operador, $invitado, $superadmin]);

        // Permisos para Inventario (CRUD)
        Permission::create(['name' => 'create.inventory'])->syncRoles([$operador, $superadmin]);
        Permission::create(['name' => 'update.inventory'])->syncRoles([$operador, $superadmin]);
        Permission::create(['name' => 'delete.inventory'])->syncRoles([$operador, $superadmin]);
        Permission::create(['name' => 'show.inventory'])->syncRoles([$operador, $superadmin, $invitado]);

        // Permiso para eliminar Historia del producto
        Permission::create(['name' => 'delete.inventory.history'])->syncRoles([$operador,$superadmin]);
        
    

    }
}
