<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_dependencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bitacoraDependencias_id')->unsigned();
            $table->foreign('bitacoraDependencias_id')->references('id')->on('dependencias')->onDelete('cascade');
            $table->string('nombreDependencias',100);
            $table->string('codigoDependencias',11);
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
        Schema::dropIfExists('bitacora_dependencias');
    }
}
