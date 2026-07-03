<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expediente_movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expediente_id')->constrained('expedientes')->cascadeOnDelete();
            $table->string('area_origen')->nullable();
            $table->string('area_destino');
            $table->string('accion'); // "Derivado", "Observado", "Aprobado", etc.
            $table->text('comentario')->nullable();
            $table->foreignId('usuario_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expediente_movimientos');
    }
};
