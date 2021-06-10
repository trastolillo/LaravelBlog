<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenusPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarios_id');
            $table->string('titulo', 150);
            $table->string('slug', 150)->unique();
            $table->string('descripcion', 255)->unique();
            $table->text('contenido');
            $table->boolean('estado')->default(1);
            $table->timestamps();
            $table->foreign('usuarios_id', 'fk_post_usuario')
                ->references('id')->on('usuarios')
                ->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}