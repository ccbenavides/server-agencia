<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('central');
            $table->string('telefono');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('marca_agencia', function(Blueprint $table){
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->integer('agencia_id')->unsigned();
            $table->foreign('agencia_id')->references('id')->on('agencias');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marca_agencia');
        Schema::dropIfExists('marcas');
    }
}
