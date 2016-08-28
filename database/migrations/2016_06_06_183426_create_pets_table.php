<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date_start');
            $table->dateTime('date_end');

            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->integer('pet_size_id')->unsigned();
            $table->foreign('pet_size_id')->references('id')->on('pet_sizes');
            $table->integer('pet_breed_id')->unsigned();
            $table->foreign('pet_breed_id')->references('id')->on('pet_breeds');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pets');
    }
}
