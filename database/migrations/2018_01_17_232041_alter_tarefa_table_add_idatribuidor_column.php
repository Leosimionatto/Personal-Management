<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTarefaTableAddIdatribuidorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefa', function(Blueprint $table){
            $table->integer('idatribuidor');

            $table->foreign('idatribuidor')
                ->references('id')
                ->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarefa', function(Blueprint $table){
            $table->dropColumn('idatribuidor');
        });
    }
}
