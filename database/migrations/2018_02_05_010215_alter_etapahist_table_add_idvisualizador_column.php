<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEtapahistTableAddIdvisualizadorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etapahist', function(Blueprint $table){
            $table->integer('idvisualizador')->nullable();

            $table->foreign('idvisualizador')
                ->references('id')
                ->on('participante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etapahist', function(Blueprint $table){
            $table->dropColumn('idvisualizador');
        });
    }
}
