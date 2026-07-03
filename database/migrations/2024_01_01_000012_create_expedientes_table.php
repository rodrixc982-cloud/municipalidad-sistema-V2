<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_expediente', 30)->unique(); // ej: 2026-000123
            $table->foreignId('contribuyente_id')->constrained('contribuyentes');
            $table->foreignId('tipo_tramite_id')->constrained('tipos_tramite');
            $table->string('asunto');
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['registrado', 'en_proceso', 'observado', 'aprobado', 'rechazado', 'finalizado'])
                ->default('registrado');
            $table->string('area_actual'); // área donde está actualmente
            $table->foreignId('registrado_por')->constrained('users');
            $table->date('fecha_limite')->nullable();
            $table->timestamps();

            $table->index('numero_expediente');
            $table->index('estado');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
