<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
            ->constrained('orders')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->float('amount', 10 , 2)->default(0);
            $table->string('provider')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('payments_details');
    }
}
