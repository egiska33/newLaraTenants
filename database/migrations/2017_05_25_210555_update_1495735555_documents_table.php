<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1495735555DocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            if(Schema::hasColumn('documents', 'content')) {
                $table->dropColumn('content');
            }
            
        });
Schema::table('documents', function (Blueprint $table) {
            $table->text('content')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('content');
            
        });
Schema::table('documents', function (Blueprint $table) {
                        $table->string('content')->nullable();
                
        });

    }
}
