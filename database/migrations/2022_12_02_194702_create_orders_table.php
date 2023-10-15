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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cliente')->nullable();
            $table->string('usuario')->nullable();
            $table->string('oc')->nullable();
            $table->string('partida')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('moneda')->nullable();
            $table->string('monto')->nullable();
            $table->string('vendedor')->nullable();
            $table->string('tipo_dibujo')->nullable();
            $table->string('comentario_diseno')->nullable();
            $table->string('salida_produccion')->nullable();
            $table->string('salida_cliente')->nullable();
            $table->string('prioridad')->nullable();
            $table->string('tipo_material')->nullable();
            $table->string('tipo_entrega_factura')->nullable();
            $table->string('tipo_entrega_remision')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
