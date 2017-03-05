<?php

use Illuminate\Database\Seeder;
use City\Entities\ExperienceType;

class ExperienceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ExperienceType::create([
            'name' => 'Menos de 1 año',
            'description' => ''
        ]);
        ExperienceType::create([
            'name' => 'Entre 1 y 2 años',
            'description' => ''
        ]);
        ExperienceType::create([
            'name' => 'Entre 2 y 3 años',
            'description' => ''
        ]);
        ExperienceType::create([
            'name' => 'Entre 3 y 4 años',
            'description' => ''
        ]);
        ExperienceType::create([
            'name' => 'más de 4 años',
            'description' => ''
        ]);

    }
}
