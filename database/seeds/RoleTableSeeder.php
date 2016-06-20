<?php

use Illuminate\Database\Seeder;
use City\Entities\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Usuario']);
        Role::create(['name'=>'Proveedor']);
        Role::create(['name'=>'Administrador']);
    }
}
