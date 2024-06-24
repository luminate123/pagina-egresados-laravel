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
        Schema::create('informacion_contacto', function (Blueprint $table) {
            $table->id();
            $table->longText('direccion_domicilio');
            $table->string('numero_telefono');
            $table->longText('correo_electronico');
            $table->foreignId('persona_id')->references('id')->on('datos_personales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_contacto');
    }
};
