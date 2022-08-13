<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_adresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('municipe')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
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
        Schema::dropIfExists('user_adresses');
    }
}
