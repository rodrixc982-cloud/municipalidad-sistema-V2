<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('declaraciones_predio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('predio_id')->constrained('predios')->cascadeOnDelete();
            $table->unsignedSmallInteger('anio');
            $table->decimal('valor_terreno', 12, 2)->default(0);
            $table->decimal('valor_construccion', 12, 2)->default(0);
            $table->decimal('valor_autovaluo', 12, 2)->default(0);
            $table->decimal('impuesto_anual', 12, 2)->default(0);
            $table->foreignId('registrado_por')->constrained('users');
            $table->timestamps();

            $table->unique(['predio_id', 'anio']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('declaraciones_predio');
    }
};
