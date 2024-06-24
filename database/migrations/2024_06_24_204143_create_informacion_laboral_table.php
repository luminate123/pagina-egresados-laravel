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
        Schema::create('informacion_laboral', function (Blueprint $table) {
            $table->id();
            $table->longText('situacion_laboral');
            $table->longText('nombre_empresa');
            $table->longText('cargo_puesto');
            $table->text('sector');
            $table->longText('direccion_empresa');
            $table->string('telefono_empresa');
            $table->longText('correo_empresa');
            $table->foreignId('persona_id')->references('id')->on('datos_personales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_laboral');
    }
};
