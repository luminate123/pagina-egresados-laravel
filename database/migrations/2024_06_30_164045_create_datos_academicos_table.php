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
        Schema::create('datos_academicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario'); // Agrega esta línea
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->date('año_egreso');
            $table->boolean('bachiller_academico');
            $table->boolean('titulo_academico');
            $table->string('maestria')->nullable();
            $table->string('doctorado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_academicos');
    }
};
