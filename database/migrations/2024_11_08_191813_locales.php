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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');  // Nombre del local
            $table->string('direccion');  // Dirección del local
            $table->string('telefono')->nullable();  // Teléfono del local
            $table->string('email')->nullable();  // Correo electrónico del local
            $table->string('ruc')->nullable();  // RUC o número de identificación del local
            $table->unsignedBigInteger('administrador_id');  // Llave foránea para referenciar al administrador
            $table->timestamps();
            $table->boolean('estado')->default(true);  // Si el local está activo o inactivo

            // Establecer la llave foránea que referencia al administrador
            $table->foreign('administrador_id')->references('id')->on('administrador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
