<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('propiedad_id')->references('id')->unsigned()->nullable();
            $table->date('fecha_pago');
            $table->string('descripcion')->nullable();
            $table->boolean('tipo_pago');
            $table->boolean('estado');
            $table->double('monto',8,2);
            $table->timestamps();

            $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('set null');
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
