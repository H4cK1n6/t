<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoTipoTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_tipo-tramite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estado_id');
		    $table->unsignedBigInteger('tipo-tramite_id');

		    $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
		    $table->foreign('tipo-tramite_id')->references('id')->on('tipo-tramites')->onDelete('cascade');

            $table->integer('t-min');
            $table->integer('t-max');

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
        Schema::dropIfExists('estado_tipo-tramite');
    }
}
