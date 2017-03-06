<?php

use Illuminate\Database\Seeder;
use City\Entities\ServiceType;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ServiceType::create([
            'name' => 'Guarderia',
            'description' => 'Guarderia',
            'kind_service_id' => '1'

        ]);

        ServiceType::create([
            'name' => 'Hotel',
            'description' => 'Hotel',
            'kind_service_id' => '1'
        ]);

        ServiceType::create([
            'name' => 'Paseador',
            'description' => 'Paseador',
            'kind_service_id' => '1'
        ]);

        ServiceType::create(['name' => 'Aseo Hogar','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Electricista','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Plomería','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Limpieza Alfombras','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Ayuda Mudanzas','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Jardinería Básica','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Carpintería','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Pintura Hogar (Interior y Exterior)','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Mecánico Carros','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Mecánico Motos','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Mantenimiento Computadores','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Mantenimiento Electrodomésticos','kind_service_id' => '2']);
        ServiceType::create(['name' => 'Comida','kind_service_id' => '3']);
    }
}
