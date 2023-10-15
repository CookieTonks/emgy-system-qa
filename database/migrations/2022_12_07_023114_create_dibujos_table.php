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
        Schema::create('dibujos', function (Blueprint $table) {
            $table->id();
            $table->string('ot')->nullable();
            $table->string('cliente')->nullable();
            $table->string('estatus')->nullable();
            $table->string('dibujo_persona')->nullable();
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
        Schema::dropIfExists('dibujos');
    }
};
