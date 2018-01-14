<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTarefaTableAddIdgrupoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefa', function(Blueprint $table){
            $table->integer('idgrupo');

            $table->foreign('idgrupo')
                ->references('id')
                ->on('grupo');
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
            $table->dropColumn('idgrupo');
        });
    }
}
