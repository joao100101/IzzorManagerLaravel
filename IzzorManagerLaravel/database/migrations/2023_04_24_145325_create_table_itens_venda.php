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
        Schema::create('table_itens_venda', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('venda_id');
            $table->integer('produto_id');
            $table->integer('quantidade');
            $table->float('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_itens_venda');
    }
};
