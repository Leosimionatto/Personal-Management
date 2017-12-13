<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrioridadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prioridade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codprioridade', 3);
            $table->string('nmprioridade');
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
        Schema::dropIfExists('prioridade');
    }
}
