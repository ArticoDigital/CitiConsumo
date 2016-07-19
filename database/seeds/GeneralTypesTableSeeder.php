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
        GeneralType::create(['name' => 'Aseo Hogar']);
        GeneralType::create(['name' => 'Electricista']);
        GeneralType::create(['name' => 'Plomería']);
        GeneralType::create(['name' => 'Limpieza Alfombras']);
        GeneralType::create(['name' => 'Ayuda Mudanzas']);
        GeneralType::create(['name' => 'Jardinería Básica']);
        GeneralType::create(['name' => 'Carpintería']);
        GeneralType::create(['name' => 'Pintura Hogar (Interior y Exterior)']);
        GeneralType::create(['name' => 'Mecánico Carros']);
        GeneralType::create(['name' => 'Mecánico Motos']);
        GeneralType::create(['name' => 'Mantenimiento Computadores']);
        GeneralType::create(['name' => 'Mantenimiento Electrodomésticos']);
    }
}
