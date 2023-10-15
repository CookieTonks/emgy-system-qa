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
        Schema::create('jets_rutas', function (Blueprint $table) {
            $table->id();
            $table->string('ot')->nullable();
            $table->string('sistema_ot')->nullable();
            $table->string('sistema_ingenieria')->nullable();
            $table->string('sistema_almacen')->nullable();
            $table->string('sistema_compras')->nullable();
            $table->string('sistema_produccion')->nullable();
            $table->string('sistema_calidad')->nullable();
            $table->string('sistema_embarques')->nullable();
            $table->string('sistema_facturacion')->nullable();
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
        Schema::dropIfExists('jets_rutas');
    }
};
