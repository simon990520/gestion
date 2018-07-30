<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dependencias_id')->unsigned();
            $table->foreign('dependencias_id')->references('id')->on('dependencias')->onDelete('cascade');
            $table->string('nombreSeries',100)->nullable();
            $table->string('codigoSeries',30)->nullable();
            $table->string('original',11)->nullable();
            $table->string('copia',11)->nullable();
            $table->string('soporte',11)->nullable();
            $table->string('gestion',11)->nullable();
            $table->string('central',11)->nullable();
            $table->string('ctfisico',11)->nullable();
            $table->string('ctelectronico',11)->nullable();
            $table->string('microfilmacion',11)->nullable();
            $table->string('digitalizacion',11)->nullable();
            $table->string('seleccion',11)->nullable();
            $table->string('eliminacion',11)->nullable();
            $table->string('estado',11);

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
        Schema::dropIfExists('series');
    }
}
