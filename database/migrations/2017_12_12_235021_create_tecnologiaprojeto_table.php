<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTecnologiaprojetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnologiaprojeto', function (Blueprint $table){
            $table->increments('id');
            $table->integer('idprojeto');
            $table->integer('idtecnologia');

            $table->foreign('idprojeto')
                ->references('id')
                ->on('projeto');

            $table->foreign('idtecnologia')
                ->references('id')
                ->on('tecnologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnologiaprojeto');
    }
}
