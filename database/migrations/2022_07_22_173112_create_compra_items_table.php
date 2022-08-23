<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * qtd, custouniterio
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_items', function (Blueprint $table) {
            $table->id();
            $table->integer('qtd')->unsigned()->nullable()->default(0);
            $table->double('custo_unitario', 15, 2)->nullable()->default(0.00);
            $table->double('subtotal', 15, 2)->nullable()->default(0.00);
           /* $table->bigInteger('material_id')->nullable();*/
            $table->foreignId('material_id')->references('id')->on('materials');
           /* $table->bigInteger('user_id')->nullable();*/
            $table->foreignId('user_id')->references('id')->on('users');
           /* $table->bigInteger('compra_id')->nullable();*/
            $table->foreignId('compra_id')->references('id')->on('compras');
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
        Schema::dropIfExists('compra_items');
    }
}
