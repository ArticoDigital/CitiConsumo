<?php

use Illuminate\Database\Seeder;
use City\Entities\PetSize;
class PetSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PetSize::create([
            'name'=>'Muy pequeño',
            'description'=>'Entre 5 y 15 cm de alto',
        ]);
        PetSize::create([
            'name'=>'Pequeño',
            'description'=>'Entre 16 y 30 cm de alto',
        ]);
        PetSize::create([
            'name'=>'Mediano',
            'description'=>'Entre 31 y 40 cm de alto',
        ]);
        PetSize::create([
            'name'=>'Grande',
            'description'=>'Entre 41 y 50 cm de alto',
        ]);
        PetSize::create([
            'name'=>'Muy grande',
            'description'=>'Mas de 50 cm de alto'
        ]);

    }
}
