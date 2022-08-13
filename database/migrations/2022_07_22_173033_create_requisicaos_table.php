<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->string('obs', 100)->nullable();
            $table->integer('estado')->unsigned()->nullable()->default(0);
            $table->double('total', 15, 2)->nullable()->default(0.00);
            $table->bigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('requisicaos');
    }
}
