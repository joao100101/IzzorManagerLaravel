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
        // id
        // cliente
        // data
        // totaltaxas
        // soma_custo_itens_vendidos
        // soma_valor_venda_itens
        // valor_frete
        // total
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cliente');
            $table->date('data');
            $table->float('total_taxas');
            $table->float('custos_totais');
            $table->float('total_venda');
            $table->float('valor_frete');
            $table->float('total');
            $table->unsignedBigInteger('plataforma_id');
            $table->foreign('plataforma_id')
                ->references('id')->on('plataformas')
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
        Schema::dropIfExists('vendas');
    }
};
