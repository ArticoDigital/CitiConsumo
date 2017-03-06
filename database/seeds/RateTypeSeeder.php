<?php

use Illuminate\Database\Seeder;
use City\Entities\RateType;

class RateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RateType::create([
            'name' => 'Hora',
            'description' => 'Cobro por hora'
        ]);
        RateType::create([
            'name' => 'Labor',
            'description' => 'Cobro por trabajo realizado'
        ]);
        RateType::create([
            'name' => 'Día',
            'description' => 'Cobro por Día'
        ]);
        RateType::create([
            'name' => 'Noche',
            'description' => 'Cobro por Noche'
        ]);

    }
}
