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
        Schema::create('datos_profesionales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario'); // Agrega esta línea
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->string('situacion_laboral');
            $table->string('empresa_actual')->nullable();
            $table->string('puesto_actual')->nullable();
            $table->string('sector_empresa_actual')->nullable();
            $table->string('redes_sociales')->nullable();
            $table->unsignedBigInteger('curriculum'); // Asegúrate de que el tipo de dato coincida con el tipo de la clave primaria de la tabla referenciada
            $table->foreign('curriculum')->references('id')->on('curriculums')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_profesionales');
    }
};
