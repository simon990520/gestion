<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serie_id')->unsigned();
            $table->foreign('serie_id')->references('id')->on('series')->onDelete('cascade');
            $table->string('nombreSubSeries',100)->nullable();
            $table->string('codigoSubSeries',30)->nullable();
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
            $table->string('estado',11);
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
        Schema::dropIfExists('sub_series');
    }
}
