<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('predios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_catastral', 30)->unique();
            $table->foreignId('contribuyente_id')->constrained('contribuyentes');
            $table->string('direccion');
            $table->string('distrito');
            $table->decimal('area_terreno', 10, 2)->default(0); // m2
            $table->decimal('area_construida', 10, 2)->default(0); // m2
            $table->enum('uso', ['vivienda', 'comercio', 'industria', 'terreno_sin_construir', 'otro'])
                ->default('vivienda');
            $table->enum('condicion', ['urbano', 'rustico'])->default('urbano');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->index('codigo_catastral');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('predios');
    }
};
