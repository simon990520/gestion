<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraSubSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_sub_series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Subserie_id')->unsigned();
            $table->foreign('Subserie_id')->references('id')->on('sub_series')->onDelete('cascade');
            $table->integer('serie_id')->unsigned();
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
            $table->string('nombreSubSeries',100);
            $table->string('codigoSubSeries',11);
            $table->string('originalSubSeries',11)->nullable();
            $table->string('copiaSubSeries',11)->nullable();
            $table->string('soporteSubSeries',11)->nullable();
            $table->string('gestionSubSeries',11)->nullable();
            $table->string('centralSubSeries',11)->nullable();
            $table->string('ctfisicoSubSeries',11)->nullable();
            $table->string('ctelectronicoSubSeries',11)->nullable();
            $table->string('microfilmacionSubSeries',11)->nullable();
            $table->string('digitalizacionSubSeries',11)->nullable();
            $table->string('seleccionSubSeries',11)->nullable();
            $table->string('eliminacionSubSeries',11)->nullable();
            $table->string('action',11);
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bitacora_sub_series');
    }
}
