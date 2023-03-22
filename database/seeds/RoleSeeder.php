<?php

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
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Encargado']);
        $role3 = Role::create(['name' => 'Usuario']);
        
        Permission::create(['name' => 'usuario.index'])->assignRole($role1);
        Permission::create(['name' => 'usuario.edit'])->assignRole($role1);
        Permission::create(['name' => 'usuario.update'])->assignRole($role1);

        Permission::create(['name' => 'ventas.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'ventas.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'ventas.edit'])->assignRole($role1);
        Permission::create(['name' => 'ventas.destroy'])->assignRole($role1);

        Permission::create(['name' => 'contactos.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'contactos.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'contactos.edit'])->assignRole($role1);
        Permission::create(['name' => 'contactos.destroy'])->assignRole($role1);

        Permission::create(['name' => 'categorias.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'categorias.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'categorias.edit'])->assignRole($role1);
        Permission::create(['name' => 'categorias.destroy'])->assignRole($role1);

        Permission::create(['name' => 'item.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'item.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'item.edit'])->assignRole($role1);
        Permission::create(['name' => 'item.destroy'])->assignRole($role1);
        
    }   
}