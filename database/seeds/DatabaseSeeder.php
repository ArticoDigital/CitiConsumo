<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(FileTypesTableSeeder::class);
        $this->call(GeneralTypesTableSeeder::class);
        $this->call(FoodTypesTableSeeder::class);
        $this->call(PetSizesTableSeeder::class);
        $this->call(PetBreedsTableSeeder::class);

        $this->call(TemperamentsTableSeeder::class);
    }
}
