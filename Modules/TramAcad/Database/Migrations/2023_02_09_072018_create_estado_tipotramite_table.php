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
        Schema::create('estado_tipotramite', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tipotramite_id');
            $table->unsignedBigInteger('estado_id');
		    
		    $table->foreign('tipotramite_id')->references('id')->on('tipotramites')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');

            $table->integer('t_min');
            $table->integer('t_max');

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
        Schema::dropIfExists('estado_tipotramite');
    }
}
