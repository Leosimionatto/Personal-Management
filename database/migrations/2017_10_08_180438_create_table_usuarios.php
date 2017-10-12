<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome', 120);
            $table->string('documento', 14);
            $table->string('email', 120);
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
        Schema::drop('usuario');
    }
}
