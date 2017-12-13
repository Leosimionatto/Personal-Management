<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nmprojeto', 120);
            $table->text('descricao');
            $table->integer('idsituacao');
            $table->integer('idtpprojeto');
            $table->integer('idprioridade');
            $table->integer('idusuario');
            $table->date('dtentrega')->nullable();
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idusuario')
                ->references('id')
                ->on('usuario');

            $table->foreign('idsituacao')
                ->references('id')
                ->on('situacao');

            $table->foreign('idprioridade')
                ->references('id')
                ->on('prioridade');

            $table->foreign('idtpprojeto')
                ->references('id')
                ->on('tpprojeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projeto');
    }
}
