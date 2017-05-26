<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495732085HousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('houses')) {
            Schema::create('houses', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('landlord_id')->unsigned()->nullable();
                $table->foreign('landlord_id', '40071_59270f75d3730')->references('id')->on('users')->onDelete('cascade');
                $table->integer('tenant_id')->unsigned()->nullable();
                $table->foreign('tenant_id', '40071_59270f75d7a49')->references('id')->on('users')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
