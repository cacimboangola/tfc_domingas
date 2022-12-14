<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicaoItemsTable extends Migration
{
    /**
     * Run the migrations.
     * iditemrequisitado, qtdsolicitada, qtdrecebida, datarecebimento,datadevolucao,qtddevolvida
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicao_items', function (Blueprint $table) {
            $table->id();
            $table->integer('qtd_solicitada')->unsigned()->nullable()->default(0);
            $table->integer('qtd_recebida')->unsigned()->nullable()->default(0);
            $table->integer('qtd_devolvida')->unsigned()->nullable()->default(0);
            $table->date('data_recebimento')->nullable();
            $table->date('data_devolucao')->nullable();
            $table->string('fornecedor_nome')->nullable();
            $table->string('fornecedor_telefone')->nullable();
            $table->string('fornecedor_endereco')->nullable();
            $table->foreignId('material_id')->references('id')->on('materials');
            $table->foreignId('requisicao_id')->references('id')->on('requisicaos');
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
        Schema::dropIfExists('requisicao_items');
    }
}
