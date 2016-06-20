<?php

use Illuminate\Database\Seeder;
use City\Entities\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Service::create([
           'name' => 'servicio1',
           'location' => '1,1',
            'description' => 'Servicio',
            'isValidate' => '1',
            'isActive' => '1',
            'provider_id' => 1
        ]);
        Service::create([
            'name' => 'servicio2',
            'location' => '2,2',
            'description' => 'Servicio',
            'isValidate' => '1',
            'isActive' => '0',
            'provider_id' => 1
        ]);
        Service::create([
            'name' => 'servicio3',
            'location' => '3,3',
            'description' => 'Servicio',
            'isValidate' => '0',
            'isActive' => '0',
            'provider_id' => 1
        ]);
        //Comidas
        Service::create([
            'name' => 'comida1',
            'location' => '1,1',
            'description' => 'Comida',
            'isValidate' => '1',
            'isActive' => '1',
            'provider_id' => 2
        ]);
        Service::create([
            'name' => 'comida2',
            'location' => '2,2',
            'description' => 'Comida',
            'isValidate' => '1',
            'isActive' => '0',
            'provider_id' => 2
        ]);
        Service::create([
            'name' => 'comida3',
            'location' => '3,3',
            'description' => 'Comida',
            'isValidate' => '0',
            'isActive' => '0',
            'provider_id' => 2
        ]);

        //Mascotas
        Service::create([
            'name' => 'mascota1',
            'location' => '1,1',
            'description' => 'Hospedaje',
            'isValidate' => '1',
            'isActive' => '1',
            'provider_id' => 1
        ]);
        Service::create([
            'name' => 'mascota2',
            'location' => '2,2',
            'description' => 'Hospedaje',
            'isValidate' => '1',
            'isActive' => '0',
            'provider_id' => 2
        ]);
        Service::create([
            'name' => 'mascota3',
            'location' => '3,3',
            'description' => 'Hospedaje',
            'isValidate' => '0',
            'isActive' => '0',
            'provider_id' => 1
        ]);
    }
}
