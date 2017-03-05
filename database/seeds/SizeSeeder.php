<?php

use Illuminate\Database\Seeder;
use City\Entities\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Size::create([
            'name'=>'Pequeño',
            'description'=>'1-20 lbs',
        ]);

        Size::create([
            'name'=>'Mediano',
            'description'=>'20-40 lbs ',
        ]);

        Size::create([
            'name'=>'Grande',
            'description'=>'40-80 lbs',
        ]);

        Size::create([
            'name'=>'Muy grande',
            'description'=>'80+ lbs'
        ]);
    }
}
