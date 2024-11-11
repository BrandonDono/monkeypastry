<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable(); // Opcional
            $table->string('rol')->default('admin'); // Puede ser 'superadmin', etc.
            $table->timestamps(); // Incluye created_at y updated_at
            $table->boolean('estado')->default(true); // Activo o inactivo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrador');
    }
};
