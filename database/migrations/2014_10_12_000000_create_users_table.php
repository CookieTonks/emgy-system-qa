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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID principal
            $table->string('email')->unique(); // Email único
            $table->string('name'); // Nombre del usuario
            $table->string('role')->nullable(); // Rol del usuario (nullable si no es obligatorio)
            $table->string('turno')->nullable(); // Turno (nullable)
            $table->string('maquina')->nullable(); // Máquina asignada (nullable)
            $table->timestamp('email_verified_at')->nullable(); // Verificación de email
            $table->string('password'); // Contraseña
            $table->rememberToken(); // Token para "remember me"
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
        Schema::dropIfExists('users');
    }
};
