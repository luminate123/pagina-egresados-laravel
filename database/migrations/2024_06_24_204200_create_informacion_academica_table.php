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
        Schema::create('informacion_academica', function (Blueprint $table) {
            $table->id();
            $table->year('ano_ingreso');
            $table->year('ano_egreso');
            $table->tinyInteger('titulo_obtenido');
            $table->longText('maestria');
            $table->longText('doctorado');
            $table->foreignId('persona_id')->references('id')->on('datos_personales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_academica');
    }
};
