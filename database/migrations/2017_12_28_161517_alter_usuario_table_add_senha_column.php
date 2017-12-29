<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuarioTableAddSenhaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario', function(Blueprint $table){
            $table->string('senha', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario', function(Blueprint $table){
            $table->dropColumn('senha');
        });
    }
}
