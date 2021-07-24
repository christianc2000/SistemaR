<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=> 'Admin']);
        $role2=Role::create(['name'=> 'Cajero']);

        Permission::create(['name'=>'users.index',
                            'description'=>'ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.create',
                            'description'=>'crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.edit',
                            'description'=>'editar usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.destroy',
                            'description'=>'eliminar usuario'])->syncRoles([$role1]);

        Permission::create(['name'=>'cargos.index',
                            'description'=>'ver listado de cargos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'cargos.create',
                            'description'=>'crear cargo'])->syncRoles([$role1]);
        Permission::create(['name'=>'cargos.edit',
                            'description'=>'editar cargo'])->syncRoles([$role1]);
        Permission::create(['name'=>'cargos.destroy',
                            'description'=>'eliminar cargo'])->syncRoles([$role1]);

        Permission::create(['name'=>'proveedors.index',
                            'description'=>'ver listado de proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'proveedors.create',
                            'description'=>'crear proveedor'])->syncRoles([$role1]);
        Permission::create(['name'=>'proveedors.edit',
                            'description'=>'editar proveedor'])->syncRoles([$role1]);
        Permission::create(['name'=>'proveedors.destroy',
                            'description'=>'eliminar proveedor'])->syncRoles([$role1]);
    }
}
