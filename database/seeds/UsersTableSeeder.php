<?php

use Illuminate\Database\Seeder;
use City\User;
use City\Entities\Provider;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Adminsitrador
        User::create([
            'name' => 'Administrador',
            'second_name' => 'Admin',
            'last_name' => 'Admin',
            'second_last_name' => 'admin',
            'location' => '33,33',
            'profile_image' => '',
            'email' => 'danielrqo@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => '3'
        ]);


        //Usuarios
        $user1=User::create([
            'name' => 'Santiago',
            'second_name' => '',
            'last_name' => 'Ruiz',
            'second_last_name' => '',
            'location' => '33,33',
            'profile_image' => '',
            'email' => 'sanruiz1003@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => '1'
        ]);
        $user2=User::create([
            'name' => 'Juan',
            'second_name' => '',
            'last_name' => 'Ramos',
            'second_last_name' => '',
            'location' => '33,33',
            'profile_image' => '',
            'email' => 'juan2ramos@gmail.com',
            'password' => bcrypt('12345'),
            'role_id' => '1'
        ]);
        User::create([
            'name' => 'Daniel',
            'second_name' => '',
            'last_name' => 'Quintero',
            'second_last_name' => '',
            'location' => '33,33',
            'profile_image' => '',
            'email' => 'danielrqo@hotmail.com',
            'password' => bcrypt('12345'),
            'role_id' => '1'
        ]);

        //provider
        Provider::create([
            'isActive'=>true,
            'user_id'=>$user1->id
        ]);
        Provider::create([
            'isActive'=>false,
            'user_id'=>$user2->id
        ]);
    }
}
