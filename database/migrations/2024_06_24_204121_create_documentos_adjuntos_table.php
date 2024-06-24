<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('documentos_adjuntos', function (Blueprint $table) {
            $table->id();
            $table->longText('curriculum_vitae');
            $table->longText('copia_titulo');
            $table->longText('copia_dni');
            $table->longText('certificados_adicionales'); 
            $table->foreignId('persona_id')->references('id')->on('datos_personales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos_adjuntos');
    }
};
