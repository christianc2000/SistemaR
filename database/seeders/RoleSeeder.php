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

        Permission::create(['name'=>'users.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=>'cargos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'cargos.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'cargos.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'cargos.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=>'proveedors.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'proveedors.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'proveedors.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'proveedors.destroy'])->syncRoles([$role1]);
    }
}
