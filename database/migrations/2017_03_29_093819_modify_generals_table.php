<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generals', function (Blueprint $table) {
            //
            $table->dropForeign('generals_general_type_id_foreign');
            $table->dropColumn('general_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generals', function (Blueprint $table) {
            //
         //   $table->integer('general_type_id')->unsigned();
         //   $table->foreign('general_type_id')->references('id')->on('general_types');
        });
    }
}
