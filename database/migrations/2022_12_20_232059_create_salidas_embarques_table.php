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
        Schema::create('salidas_embarques', function (Blueprint $table) {
            $table->id();
            $table->string('ot')->nullable();
            $table->string('tipo_salida')->nullable();
            $table->string('tipo_tratamiento')->nullable();
            $table->string('proveedor')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('estatus')->nullable();
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
        Schema::dropIfExists('salidas_embarques');
    }
};
