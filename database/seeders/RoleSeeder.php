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
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'cliente']);

       // Permission::create(['name' => 'admin.home']);

        Permission::create(['name' => 'admin.index'])->syncRoles($role1);
        Permission::create(['name' => 'admin.edit'])->syncRoles($role1);
        Permission::create(['name' => 'admin.update'])->syncRoles($role1);

        Permission::create(['name' => 'derivaciones.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'derivaciones.create'])->syncRoles($role1);
        Permission::create(['name' => 'derivaciones.edit'])->syncRoles($role1);
        Permission::create(['name' => 'derivaciones.show'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'derivaciones.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'doctores.index'])->syncRoles($role1);
        Permission::create(['name' => 'doctores.create'])->syncRoles($role1);
        Permission::create(['name' => 'doctores.edit'])->syncRoles($role1);
        Permission::create(['name' => 'doctores.show'])->syncRoles($role1);
        Permission::create(['name' => 'doctores.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'familiares.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'familiares.create'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'familiares.edit'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'familiares.show'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'familiares.destroy'])->syncRoles($role1,$role2);

        Permission::create(['name' => 'medicamentos.index'])->syncRoles($role1);
        Permission::create(['name' => 'medicamentos.create'])->syncRoles($role1);
        Permission::create(['name' => 'medicamentos.edit'])->syncRoles($role1);
        Permission::create(['name' => 'medicamentos.show'])->syncRoles($role1);
        Permission::create(['name' => 'medicamentos.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'pacientes.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'pacientes.create'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'pacientes.edit'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'pacientes.show'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'pacientes.destroy'])->syncRoles($role1,$role2);

        Permission::create(['name' => 'recetas.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'recetas.create'])->syncRoles($role1);
        Permission::create(['name' => 'recetas.edit'])->syncRoles($role1);
        Permission::create(['name' => 'recetas.show'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'recetas.destroy'])->syncRoles($role1);

        Permission::create(['name' => 'turnos.index'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'turnos.create'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'turnos.edit'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'turnos.show'])->syncRoles($role1,$role2);
        Permission::create(['name' => 'turnos.destroy'])->syncRoles($role1,$role2);

        //Permission::create(['name' => 'derivaciones.index']);
        //Permission::create(['name' => 'derivaciones.create']);
        //Permission::create(['name' => 'derivaciones.edit']);
        //Permission::create(['name' => 'derivaciones.show']);
        //Permission::create(['name' => 'derivaciones.destroy']);
    }
}
