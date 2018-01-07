<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterParticipanteTableAddIdcargoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participante', function(Blueprint $table){
            $table->dropColumn('cargo');
            $table->integer('idcargo')->nullable();

            $table->foreign('idcargo')
                ->references('id')
                ->on('cargo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participante', function(Blueprint $table){
            $table->dropColumn('idcargo');
            $table->string('cargo', 200)->nullable();
        });
    }
}
