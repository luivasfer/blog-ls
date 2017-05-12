<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag', 15);
            $table->timestamps();
        });

        //creamos una relacion de muchos a muchos
        //tabla pibot

        //Articulos  & Tags  = tags & articulos = articulos_tag
        Schema::create('articulo_tag', function(Blueprint $table){
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            //Relaciones
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('tag_id')->references('id')->on('tags');

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
        Schema::dropIfExists('tags');
    }
}
