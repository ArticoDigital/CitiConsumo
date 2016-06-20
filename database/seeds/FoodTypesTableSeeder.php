<?php

use Illuminate\Database\Seeder;
use City\Entities\FoodType;

class FoodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        FoodType::create([
            'name' => 'Desayuno',
            'description' => 'desc. desayuno'
        ]);

        FoodType::create([
            'name' => 'Almuerzo',
            'description' => 'desc. Almuerzo'
        ]);

        FoodType::create([
            'name' => 'Cena',
            'description' => 'desc. Cena'
        ]);

        FoodType::create([
            'name' => 'Ensalada',
            'description' => 'desc. Ensalada'
        ]);

        FoodType::create([
            'name' => 'Asado',
            'description' => 'desc. asado'
        ]);

        FoodType::create([
            'name' => 'Sopa',
            'description' => 'desc. sopa'
        ]);

        FoodType::create([
            'name' => 'Postre',
            'description' => 'desc. postre'
        ]);

    }
}
