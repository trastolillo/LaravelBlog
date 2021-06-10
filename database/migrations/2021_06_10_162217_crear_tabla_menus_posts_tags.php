<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMenusPostsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('posts_id');
            $table->unsignedBigInteger('tags_id');
            $table->foreign('posts_id', 'fk_posttag_posts')
                ->references('id')->on('posts')
                ->onDelete('cascade')->onUpdate('restrict');
            $table->foreign('tags_id', 'fk_posttag_tags')
                ->references('id')->on('tags')
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
        Schema::dropIfExists('posts_tags');
    }
}