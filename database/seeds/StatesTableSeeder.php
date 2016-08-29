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
        State::create(['name'=>'Pendiente']);
        State::create(['name'=>'Solicitado']);
        State::create(['name'=>'Pagado']);
    }
}
