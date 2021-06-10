<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenusPostsCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('posts_id');
            $table->unsignedBigInteger('categorias_id');
            $table->foreign('posts_id', 'fk_postcategoria_posts')
                ->references('id')->on('posts')
                ->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('categorias_id', 'fk_postcategoria_categoria')
                ->references('id')->on('categorias')
                ->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_categorias');
    }
}