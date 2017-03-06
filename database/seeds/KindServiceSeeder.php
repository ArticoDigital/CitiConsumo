<?php

use Illuminate\Database\Seeder;
use City\Entities\KindService;

class KindServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        KindService::create([
            'name' => 'Mascotas',
            'description' => 'Servicios para mascotas'
        ]);

        KindService::create([
            'name' => 'Servicios',
            'description' => 'Servicios generales'
        ]);

        KindService::create([
            'name' => 'Comidas',
            'description' => 'Servicios de comidas'
        ]);

        

    }
}
