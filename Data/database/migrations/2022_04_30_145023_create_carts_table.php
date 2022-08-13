<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_session_id')
            ->constrained('shopping_sessions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('idLinha', 100);
            $table->foreign('idLinha')->references('idLinha')->on('listaArtigos');
            $table->float('quantity', 8 , 2)->default(0);
            $table->float('subtotal', 10 , 2)->default(0);
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
        Schema::dropIfExists('carts');
    }
}
