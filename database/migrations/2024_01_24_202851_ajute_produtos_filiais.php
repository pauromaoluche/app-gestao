<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('filiais', function (Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produto_filiais', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table){
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table){
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        Schema::table('produto_filiais', function (Blueprint $table) {
            //remove a fk
            $table->dropForeign('produto_filiais_filial_id_foreign');

            $table->dropForeign('produto_filiais_produto_id_foreign');
            //remove a coluina
            $table->dropColumn('filial_id');
            $table->dropColumn('produto_id');
        });

        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
};
