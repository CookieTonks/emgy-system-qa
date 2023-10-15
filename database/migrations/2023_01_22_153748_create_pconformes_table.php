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
        Schema::create('pconformes', function (Blueprint $table) {
            $table->id();
            $table->string('ot')->nullable();
            $table->string('operador')->nullable();
            $table->string('num_parte')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('cant')->nullable();
            $table->string('cliente')->nullable();
            $table->string('analisis')->nullable();
            $table->string('origen')->nullable();
            $table->string('disposicion')->nullable();
            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('pconformes');
    }
};
