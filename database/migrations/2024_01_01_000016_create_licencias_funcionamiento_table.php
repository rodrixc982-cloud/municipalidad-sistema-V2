<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('licencias_funcionamiento', function (Blueprint $table) {
            $table->id();
            $table->string('numero_licencia', 30)->unique();
            $table->foreignId('contribuyente_id')->constrained('contribuyentes');
            $table->string('nombre_comercial');
            $table->string('giro_negocio');
            $table->string('direccion_local');
            $table->date('fecha_emision');
            $table->date('fecha_vencimiento')->nullable();
            $table->enum('estado', ['vigente', 'vencida', 'anulada'])->default('vigente');
            $table->timestamps();

            $table->index('numero_licencia');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('licencias_funcionamiento');
    }
};
