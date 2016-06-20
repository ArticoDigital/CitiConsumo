<?php

use Illuminate\Database\Seeder;
use City\Entities\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create(['name'=>'En espera de confirmación']);
        State::create(['name'=>'Confirmado']);
        State::create(['name'=>'Cancelado']);
    }
}
