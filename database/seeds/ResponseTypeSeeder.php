<?php

use Illuminate\Database\Seeder;
use City\Entities\ResponseType;

class ResponseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ResponseType::create([
            'name' => '30 minutos',
            'description' => 'Respondo en máximo 30 minutos'
            

        ]);

        ResponseType::create([
            'name' => '1 hora',
            'description' => 'Respondo en máximo una hora'
            

        ]);

        ResponseType::create([
            'name' => '2 horas',
            'description' => 'Respondo en máximo dos horas'
            
        ]);

        ResponseType::create([
            'name' => '3 horas',
            'description' => 'Respondo en máximo 3 horas'
        ]);
    }
}
