<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_images', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('categoria_id')
            ->nullable()
            ->constrained('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('url');
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
        Schema::dropIfExists('category_images');
    }
}
