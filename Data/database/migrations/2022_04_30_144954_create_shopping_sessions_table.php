<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->float('total', 10 , 2)->default(0);
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
        Schema::dropIfExists('shopping_sessions');
    }
}
