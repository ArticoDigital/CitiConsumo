<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlays', function(Blueprint $table){
            $table->increments('id');
            $table->integer('value');
            $table->string('buys_id');
            $table->integer('user_id')->unsigned();
            $table->integer('provider_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('provider_id')->references('id')->on('providers');
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
        Schema::drop('outlays');
    }
}
