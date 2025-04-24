<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'administrator']);
        $ga = Role::create(['name' => 'General Administrator']);//Administrador General
        $is = Role::create(['name' => 'Inventory Supervisor']);//Supervisor de Inventario
        $wm = Role::create(['name' => 'Warehouse Manager']);//Responsable de Almacén
        $f = Role::create(['name' => 'Billing Agent']);//Facturador

        Permission::create(['name' => 'menu administrator'])->syncRoles([$ga]);
        Permission::create(['name' => 'menu inventory supervisor'])->syncRoles([$is]);
        Permission::create(['name' => 'menu warehouse manager'])->syncRoles([$wm]);
        Permission::create(['name' => 'menu billing agent'])->syncRoles([$f]);

    }
}
