<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1495732789BillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->integer('house_id')->unsigned()->nullable();
                $table->foreign('house_id', '40072_59271234d377e')->references('id')->on('houses')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign('40072_59271234d377e');
            $table->dropIndex('40072_59271234d377e');
            $table->dropColumn('house_id');
            
        });

    }
}
