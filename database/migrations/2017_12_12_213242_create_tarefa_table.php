<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nmtarefa', 200);
            $table->text('descricao');
            $table->integer('idprioridade');
            $table->integer('idsituacao');
            $table->integer('idprojeto');
            $table->integer('idparticipante');
            $table->integer('qtdetapas');
            $table->date('dtentrega');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idprojeto')
                ->references('id')
                ->on('projeto');

            $table->foreign('idsituacao')
                ->references('id')
                ->on('situacao');

            $table->foreign('idprioridade')
                ->references('id')
                ->on('prioridade');

            $table->foreign('idparticipante')
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
        Schema::dropIfExists('tarefa');
    }
}
