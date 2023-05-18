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
        Schema::create('itens_venda', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('produto_id');
            $table->integer('quantidade');
            $table->string('tamanho');
            $table->string('cor');
            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')
                ->references('id')->on('vendas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_venda');
    }
};
