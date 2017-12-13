<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioimgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioimg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caminho', 200);
            $table->string('tpimg', 10);
            $table->integer('idusuario');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

            $table->foreign('idusuario')
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
        Schema::dropIfExists('usuarioimg');
    }
}
