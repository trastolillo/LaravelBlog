<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenusComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarios_id');
            $table->unsignedBigInteger('posts_id');
            $table->unsignedBigInteger('comentarios_id')->nullable();
            $table->text('contenido');
            $table->boolean('estado')->default(0);
            $table->foreign('usuarios_id', 'fk_comentario_usuario')
                ->references('id')->on('usuarios')
                ->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('posts_id', 'fk_comentario_post')
                ->references('id')->on('posts')
                ->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('comentarios_id', 'fk_comentario_comentario')
                ->references('id')->on('comentarios')
                ->onDelete('cascade')->onUpdate('restrict');
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
        Schema::dropIfExists('comentarios');
    }
}