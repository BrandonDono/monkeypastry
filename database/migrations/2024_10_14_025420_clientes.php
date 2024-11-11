<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) { // Aquí es $table, no $tabla
            $table->id();
            $table->string('nombre', 155);
            $table->string('a_paterno', 200);
            $table->string('a_materno', 200);
            $table->string('telefono', 250); // Cambié 'int' por 'integer'
            $table->string('correo', 255);
            $table->string('contraseña', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('clientes');
    }
};
