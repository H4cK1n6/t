<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('solicitud_id');
            $table->unsignedBigInteger('unidad_id');
            $table->unsignedBigInteger('tipotramite_id');

            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->foreign('tipotramite_id')->references('id')->on('tipotramites')->onDelete('cascade');

            $table->date('fecha_inicio');
            $table->string('descripcion');
            $table->string('estado_actual');

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
        Schema::dropIfExists('tramites');
    }
}
