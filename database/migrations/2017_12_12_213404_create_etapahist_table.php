<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapahistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapahist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idetapa');
            $table->text('descricao');
            $table->integer('idparticipante');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idparticipante')
                ->references('id')
                ->on('participante');

            $table->foreign('idetapa')
                ->references('id')
                ->on('etapa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapahist');
    }
}
