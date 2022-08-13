<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioLinhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_linhas', function (Blueprint $table) {
            $table->id();
            $table->string('artigo');
            $table->string('codigo_barras');
            $table->string('descricao');
            $table->integer('stock');
            $table->integer('contagem');
            $table->boolean('contado');
            $table->foreignId('inventario_id');
            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario_linhas');
    }
}
