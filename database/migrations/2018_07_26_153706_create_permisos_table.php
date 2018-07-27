<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ndependencias',2)->nullable();
            $table->string('cdependencias',2)->nullable();
            $table->string('edependencias',2)->nullable();
            $table->string('ddependencias',2)->nullable();
            $table->string('nseries',2)->nullable();
            $table->string('cseries',2)->nullable();
            $table->string('eseries',2)->nullable();
            $table->string('dseries',2)->nullable();
            $table->string('nsubseries',2)->nullable();
            $table->string('csubseries',2)->nullable();
            $table->string('esubseries',2)->nullable();
            $table->string('dsubseries',2)->nullable();
            $table->string('nusuarios',2)->nullable();
            $table->string('cusuarios',2)->nullable();
            $table->string('eusuarios',2)->nullable();
            $table->string('dusuarios',2)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('permisos');
    }
}
