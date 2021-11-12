<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Propiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->integer('manzana');
            $table->integer('lote');
            $table->string('zona');
            $table->string('nrodesuministro');
            $table->bigInteger('cliente_id')->unsigned()->nullable();
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->boolean('estado');
            $table->date('fecha_inscripcion');
            $table->date('fecha_adeudo');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
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
