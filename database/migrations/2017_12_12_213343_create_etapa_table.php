<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nmetapa', 200);
            $table->integer('idtarefa');
            $table->integer('idsituacao');
            $table->text('descricao');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idtarefa')
                ->references('id')
                ->on('tarefa');

            $table->foreign('idsituacao')
                ->references('id')
                ->on('situacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapa');
    }
}
