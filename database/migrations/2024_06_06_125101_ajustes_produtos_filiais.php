<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30); 
            $table->timestamps();
        });

        //tabela produtos_filiais
        Schema::create('produtos_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('filial_id');
            $table->float('preco_venda', 8,2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('filial_id')->references('id')->on('filiais');
        });

        //removendo colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //add colunas a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->float('preco_venda', 8,2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
        });

        //removendo a tabela produtos_filiais
        Schema::dropIfExists('produtos_filiais');

        //removendo a tabela filiais
        Schema::dropIfExists('filiais');

    }
};
