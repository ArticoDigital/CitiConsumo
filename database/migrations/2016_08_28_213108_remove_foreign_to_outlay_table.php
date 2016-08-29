<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForeignToOutlayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outlay', function(Blueprint $table){
            $table->dropForeign('outlay_user_id_foreign');
            $table->dropColumn('user_id');
            $table->integer('id_user')->nullable();
        });

        Schema::rename('outlay', 'outlays');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
