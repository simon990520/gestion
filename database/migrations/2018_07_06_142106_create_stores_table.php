<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',80);
            $table->string('asunto',80);
            $table->string('consecutivo',11);
            $table->string('fecha',20);
            $table->string('radicado',80);
            $table->string('unidad',80);
            $table->string('file',80);
            $table->integer('Subserie_id')->unsigned();
            $table->foreign('Subserie_id')->references('id')->on('sub_series')->onDelete('cascade');
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
        Schema::dropIfExists('stores');
    }
}
