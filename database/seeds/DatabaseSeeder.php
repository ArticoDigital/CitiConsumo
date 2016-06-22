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
        $this->call(ServicesTableSeeder::class);
        $this->call(BuysTableSeeder::class);
        $this->call(BuyServiceTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(FileTypesTableSeeder::class);
        $this->call(ProviderFilesTableSeeder::class);
        $this->call(SeviceFilesTableSeeder::class);
        $this->call(GeneralTypesTableSeeder::class);
        $this->call(GeneralsTableSeeder::class);
        $this->call(FoodTypesTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(PetSizesTableSeeder::class);
        $this->call(PetBreedsTableSeeder::class);
        $this->call(TemperamentsTableSeeder::class);
        $this->call(PetsTableSeeder::class);
        $this->call(TemperamentPetTableSeeder::class);

    }
}
