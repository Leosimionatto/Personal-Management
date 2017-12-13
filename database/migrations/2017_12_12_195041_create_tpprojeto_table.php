<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpprojetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpprojeto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nmtipo', 120);
            $table->timestamp('criado_em');
            $table->timestamp('atualizado_em');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tpprojeto');
    }
}
