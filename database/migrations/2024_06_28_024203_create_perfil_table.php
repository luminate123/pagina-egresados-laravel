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
        Schema::create('perfil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario'); // Agrega esta línea
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('telefono');
            $table->string('correo');
            $table->string('nacional');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfil');
    }
};
