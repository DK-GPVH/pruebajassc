<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->date('fechanac');
            
            $table->bigInteger('tipo_documento_id')->unsigned();

            $table->string('nrodocumento');
            $table->string('telefono');
            $table->timestamps();

            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
