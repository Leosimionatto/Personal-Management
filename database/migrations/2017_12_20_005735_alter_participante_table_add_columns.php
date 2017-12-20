<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterParticipanteTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participante', function(Blueprint $table){
            $table->string('token');
            $table->string('fltoken', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participante', function(Blueprint $table){
            $table->dropColumn('token');
            $table->dropColumn('fltoken');
        });
    }
}
