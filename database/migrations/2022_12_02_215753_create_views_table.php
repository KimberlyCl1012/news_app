<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned()->index();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_new')->unsigned()->index();
            $table->foreign('id_new')->references('id')->on('news')->onDelete('cascade');
            $table->boolean('pending')->default(0);
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
        Schema::dropIfExists('views');
    }
}
