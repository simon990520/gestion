<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serie_id')->unsigned();
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
            $table->integer('dependencias_id')->unsigned();
            $table->foreign('dependencias_id')->references('id')->on('dependencias')->onDelete('cascade');
            $table->string('nombreSeries',100);
            $table->string('codigoSeries',11);
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
            $table->string('action',11);
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_series');
    }
}
