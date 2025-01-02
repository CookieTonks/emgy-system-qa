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
            $table->id(); // ID principal
            $table->string('empresa')->nullable(); // Empresa relacionada
            $table->string('cliente')->nullable(); // Cliente asociado
            $table->string('usuario')->nullable(); // Usuario responsable
            $table->string('oc')->nullable(); // Orden de compra
            $table->string('partida')->nullable(); // Partida
            $table->string('cantidad')->nullable(); // Cantidad
            $table->string('cant_entregada')->nullable(); // Cantidad entregada
            $table->string('cant_retrabajo')->nullable(); // Cantidad para retrabajo
            $table->string('descripcion')->nullable(); // Descripción del producto
            $table->string('moneda')->nullable(); // Moneda utilizada
            $table->string('monto')->nullable(); // Monto total
            $table->string('vendedor')->nullable(); // Vendedor asignado
            $table->string('tipo_dibujo')->nullable(); // Tipo de dibujo
            $table->string('comentario_diseno')->nullable(); // Comentario de diseño
            $table->string('salida_produccion')->nullable(); // Salida de producción
            $table->string('salida_cliente')->nullable(); // Salida para cliente
            $table->string('prioridad')->nullable(); // Prioridad de la orden
            $table->string('tiempo')->nullable(); // Tiempo estimado
            $table->string('procesos')->nullable(); // Procesos involucrados
            $table->string('fecha_cliente')->nullable(); // Fecha de cliente
            $table->string('estatus')->nullable(); // Estatus de la orden
            $table->string('progreso')->nullable(); // Progreso de la orden
            $table->string('tratamiento')->nullable(); // Tratamiento requerido
            $table->string('tipo_material')->nullable(); // Tipo de material
            $table->string('tipo_entrega_factura')->nullable(); // Tipo de entrega para factura
            $table->string('tipo_entrega_remision')->nullable(); // Tipo de entrega para remisión
            $table->string('factura')->nullable(); // Factura asociada
            $table->string('fecha_entregada')->nullable(); // Fecha de entrega
            $table->timestamps(); // created_at y updated_at
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
