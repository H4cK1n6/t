<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosEstadotPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('solicitud_id');

            $table->foreign('solicitud_id')->references('id')->on('solicitudes')->onDelete('cascade');

            $table->string('nombre-documento');
            $table->string('archivo');
            $table->date('fecha_subida');

            $table->timestamps();
        });

        Schema::create('estado-tramites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tramite_id');

            $table->foreign('tramite_id')->references('id')->on('tramites')->onDelete('cascade');

            $table->string('descrip-estado');
            $table->date('fecha_estado');
            $table->string('responsable-estado');

            $table->timestamps();
        });

        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tramite_id');

            $table->foreign('tramite_id')->references('id')->on('tramites')->onDelete('cascade');

            $table->date('fecha_pago');
            $table->string('estado');
            $table->decimal('monto');

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
        Schema::dropIfExists('documentos');
        Schema::dropIfExists('estado-tramites');
        Schema::dropIfExists('pagos');
    }
}
