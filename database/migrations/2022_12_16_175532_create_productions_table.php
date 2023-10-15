<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('ot')->nullable();
            $table->string('cliente')->nullable();
            $table->string('desscripcion')->nullable();
            $table->string('maquina_asignada')->nullable();
            $table->string('persona_asignada')->nullable();
            $table->string('fecha_cliente')->nullable();
            $table->string('fecha_production')->nullable();
            $table->string('tiempo_asignado')->nullable();
            $table->string('tiempo_progreso')->nullable();
            $table->string('fecha_recepcion')->nullable();
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
        Schema::dropIfExists('productions');
    }
};
