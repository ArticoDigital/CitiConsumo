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
            'name'=>'Contraloria',
            'description'=>'Contraloria'
        ]);

        FileType::create([
            'name'=>'Policia',
            'description'=>'Policia'
        ]);

    }
}
