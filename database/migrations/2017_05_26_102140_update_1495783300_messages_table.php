<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1495783300MessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '40074_5927d78395cec')->references('id')->on('users')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('40074_5927d78395cec');
            $table->dropIndex('40074_5927d78395cec');
            $table->dropColumn('created_by_id');
            
        });

    }
}
