<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            //
            $table->dropColumn('date_start');
            $table->dropColumn('date_end');
            
            $table->boolean('puppy');
            $table->boolean('adult');
            $table->boolean('elderly'); //Adulto mayor
            $table->boolean('smoke_free');
            $table->boolean('home_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            //
            $table->date('date_start');
            $table->date('date_end');

            $table->dropColumn('puppy');
            $table->dropColumn('adult');
            $table->dropColumn('elderly'); //Adulto mayor
            $table->dropColumn('smoke_free');
            $table->dropColumn('home_service');
            
        });
    }
}
