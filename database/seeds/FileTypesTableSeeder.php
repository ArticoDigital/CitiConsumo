<?php

use Illuminate\Database\Seeder;
use City\Entities\FileType;

class FileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FileType::create([
            'name'=>'Cedula',
            'description'=>'Cedula'
        ]);

        FileType::create([
            'name'=>'Pasado judicial',
            'description'=>'Pasado judicial'
        ]);

        FileType::create([
            'name'=>'RUT',
            'description'=>'RUT'
        ]);

        FileType::create([
            'name'=>'Recibo de servicios',
            'description'=>'Recibo de servicios'
        ]);

        FileType::create([
            'name'=>'Cert. Cta bancaria',
            'description'=>'Cert. Cta bancaria'
        ]);

    }
}
