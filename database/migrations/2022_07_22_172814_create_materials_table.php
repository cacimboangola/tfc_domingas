<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 100)->nullable();
            $table->string('nome', 100)->nullable();
            $table->boolean('perecivel')->nullable()->default(false);
            $table->integer('stock_min')->unsigned()->nullable()->default(0);
            $table->integer('stock_actual')->unsigned()->nullable()->default(0);
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->integer('stock_disponivel')->unsigned()->nullable()->default(0);
            $table->foreign('categoria_id')->references('id')->on('materials');
            $table->float('preco',8, 2);
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
        Schema::dropIfExists('materials');
    }
}
