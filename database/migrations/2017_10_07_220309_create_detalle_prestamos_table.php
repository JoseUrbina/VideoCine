<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelicula_id')->unsigned();
            $table->integer('prestamo_id')->unsigned();

            $table->foreign('pelicula_id')
                            ->references('id')->on('peliculas')
                            ->onDelete('cascade');

            $table->foreign('prestamo_id')
                            ->references('id')->on('prestamos')
                            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_prestamos');
    }
}
