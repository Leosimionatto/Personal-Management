<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoimgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetoimg', function (Blueprint $table) {
            $table->increments('id');
            $table->string('caminho', 120);
            $table->string('tpimg', 10);
            $table->integer('idprojeto');
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');

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
        Schema::dropIfExists('projetoimg');
    }
}
