<?php

use Illuminate\Database\Seeder;
use City\Entities\Temperament;
class TemperamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Temperament::create(['name'=>'Agresiva','description'=>'Agresiva']);
        Temperament::create(['name'=>'Timida','description'=>'Timida']);
        Temperament::create(['name'=>'Timida Agresiva','description'=>'Timida Agresiva']);
        Temperament::create(['name'=>'Sociable','description'=>'Sociable']);

    }
}
