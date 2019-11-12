<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcentroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcentro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_sub')->unique();
            $table->string('nombre_subcentro');
 
            $table->integer('centro_id')->unsigned();
            $table->foreign('centro_id')->references('id')->on('centros');

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
        Schema::dropIfExists('subcentro');
    }
}
