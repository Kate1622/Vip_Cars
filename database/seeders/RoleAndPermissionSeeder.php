<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Usuarios
        Permission::create([
            'name' => 'seguridad.users.index',
            'group_name' => 'Usuarios',
            'nombre' => 'Ver Lista Usuarios',
            'description' => 'Listar Usuarios de la Aplicación',
            'estado' => true,
        ]);
        Permission::create([
            'name' => 'seguridad.users.create',
            'group_name' => 'Usuarios',
            'nombre' => 'Crear Usuarios',
            'description' => 'Crear Usuarios de la Aplicación',
            'estado' => true,
        ]);
        Permission::create([
            'name' => 'seguridad.users.edit',
            'group_name' => 'Usuarios',
            'nombre' => 'Editar Usuarios',
            'description' => 'Editar Usuarios de la Aplicación',
            'estado' => true,
        ]);
        Permission::create([
            'name' => 'seguridad.users.show',
            'group_name' => 'Usuarios',
            'nombre' => 'Ver Detalle del Usuarios',
            'description' => 'Ver Detalle del Usuarios de la Aplicación',
            'estado' => true,
        ]);
        Permission::create([
            'name' => 'seguridad.users.destroy',
            'group_name' => 'Usuarios',
            'nombre' => 'Elimnar Usuarios',
            'description' => 'Elimnar Usuarios de la Aplicación',
            'estado' => true,
        ]);

        //Permisos

        Permission::create([
            'name' => 'seguridad.permiso.index',
            'group_name' => 'Permisos',
            'nombre' => 'Ver Lista Permisos',
            'description' => 'Listar Permisos de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.permiso.create',
            'group_name' => 'Permisos',
            'nombre' => 'Crear Permisos',
            'description' => 'Crear Permisos de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.permiso.edit',
            'group_name' => 'Permisos',
            'nombre' => 'Editar Permisos',
            'description' => 'Editar Permisos de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.permiso.show',
            'group_name' => 'Permisos',
            'nombre' => 'Ver Detalle del Permisos',
            'description' => 'Ver Detalle del Permisos de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.permiso.destroy',
            'group_name' => 'Permisos',
            'nombre' => 'Eliminar Permisos',
            'description' => 'Eliminar Permisos de la Aplicación',
            'estado' => true,
        ]);

        //Roles

        Permission::create([
            'name' => 'seguridad.roles.index',
            'group_name' => 'Roles',
            'nombre' => 'Ver Lista Roles',
            'description' => 'Listar Roles de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.roles.create',
            'group_name' => 'Roles',
            'nombre' => 'Crear Roles',
            'description' => 'Crear Roles de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.roles.edit',
            'group_name' => 'Roles',
            'nombre' => 'Editar Roles',
            'description' => 'Editar Roles de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.roles.show',
            'group_name' => 'Roles',
            'nombre' => 'Ver Detalle del Rol',
            'description' => 'Ver Detalle del Rol de la Aplicación',
            'estado' => true,
        ]);
        
        Permission::create([
            'name' => 'seguridad.roles.destroy',
            'group_name' => 'Roles',
            'nombre' => 'Eliminar Roles',
            'description' => 'Eliminar Roles de la Aplicación',
            'estado' => true,
        ]);
        


        $adminRole = Role::create(['name' => 'Admin']);
        $gerenteRole = Role::create(['name' => 'Gerente']);

        $adminRole->givePermissionTo([
            'seguridad.users.index',
            'seguridad.users.create',
            'seguridad.users.edit',
            'seguridad.users.show',
            'seguridad.users.destroy',  
            'seguridad.permiso.index',
            'seguridad.permiso.create',
            'seguridad.permiso.edit',
            'seguridad.permiso.show',
            'seguridad.permiso.destroy', 
            'seguridad.roles.index',
            'seguridad.roles.create',
            'seguridad.roles.edit',
            'seguridad.roles.show',
            'seguridad.roles.destroy' 
        ]);

        $gerenteRole->givePermissionTo([
            'seguridad.users.index',
            'seguridad.users.create',
            'seguridad.users.edit',
            'seguridad.users.show',
        ]);

        $user =  User::find(1);
        $user->assignRole('Admin');
        
        $user2 =  User::find(2);
        $user2->assignRole('Gerente');
    }
}
