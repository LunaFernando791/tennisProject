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
        $role1=Role::create(['name'=>'Admin']);
        $role2=Role::create(['name'=>'Cliente']);

        Permission::create(['name'=>'tennis'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tennis.create'])->syncRoles([$role1, $role2]);;
        Permission::create(['name'=>'tennis.edit'])->syncRoles([$role1, $role2]);;
        Permission::create(['name'=>'tennis.destroy'])->syncRoles([$role1, $role2]);;



    }
}
