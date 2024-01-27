<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contatos', function (Blueprint $table){
            $table->unsignedBigInteger('motivo_contato_id')->after('motivo_contato')->nullable();
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
        });

        DB::statement('UPDATE contatos set motivo_contato_id = motivo_contato');

        Schema::table('contatos', function (Blueprint $table){
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Cria coluna motivo_contato, dps remove a fk
        Schema::table('contatos', function (Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('contatos_motivo_contato_id_foreign');
        });

        DB::statement('UPDATE contatos set motivo_contato = motivo_contato_id');

        Schema::table('contatos', function (Blueprint $table){
            $table->dropColumn('motivo_contato_id');
        });
    }
};
