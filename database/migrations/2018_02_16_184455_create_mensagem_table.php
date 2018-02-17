<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensagem', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idemitente');
            $table->integer('iddestinatario');
            $table->text('conteudo');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idemitente')
                ->references('id')
                ->on('usuario');

            $table->foreign('iddestinatario')
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
        Schema::dropIfExists('mensagem');
    }
}
