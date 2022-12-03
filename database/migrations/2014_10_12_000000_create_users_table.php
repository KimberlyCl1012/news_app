<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');//Nombre del usuario
            $table->string('last_name');//Apellido del usuario
            $table->string('email')->unique();//Email del usuario
            $table->string('password');//Contraseña del usuario
            $table->boolean('admin');//Bandera para saber si es admin
            $table->boolean('status');//Estatus del usuario
            $table->string('token');//token del usuario
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
        Schema::dropIfExists('users');
    }
}
