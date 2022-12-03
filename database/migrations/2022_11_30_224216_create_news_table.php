<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name');//Nombre de la noticia
            $table->longText('description',3000);//Descripción de la noticia
            $table->string('image');//Imagen de portada de la noticia
            $table->boolean('priority');//Bandera para las noticias importantes
            $table->boolean('status');//Estatus de la noticia
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
        Schema::dropIfExists('news');
    }
}
