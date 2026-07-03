<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipos_tramite', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique(); // ej: TUPA-001
            $table->string('nombre');
            $table->string('area_responsable'); // Rentas, Obras, Licencias, etc.
            $table->decimal('costo', 10, 2)->default(0);
            $table->unsignedInteger('plazo_dias')->default(15);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_tramite');
    }
};
