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
        Schema::create('registros_almacen', function (Blueprint $table) {
            $table->id();
            $table->string('id_material')->nullable();
            $table->string('ot')->nullable();
            $table->string('oc')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('factura')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('tipo_recepcion')->nullable();
            $table->string('tipo_entrega')->nullable();
            $table->string('personal')->nullable();
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
        Schema::dropIfExists('registros_almacen');
    }
};
