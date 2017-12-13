<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargo', 200)->nullable();
            $table->text('deveresdesc')->nullable();
            $table->integer('idprojeto');
            $table->integer('idusuario');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idusuario')
                ->references('id')
                ->on('usuario');

            $table->foreign('idprojeto')
                ->references('id')
                ->on('projeto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participante');
    }
}
