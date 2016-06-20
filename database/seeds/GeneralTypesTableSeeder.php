<?php

use Illuminate\Database\Seeder;
use City\Entities\GeneralType;

class GeneralTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        GeneralType::create([
            'name' => 'Servicios generales',
            'description' => 'descripcion Servicios generales'
        ]);

        GeneralType::create([
            'name' => 'Carpinteria',
            'description' => 'Desc carpinteria'
        ]);

        GeneralType::create([
            'name' => 'Plomeria',
            'description' => 'descripcion plomeria'
        ]);
    }
}
