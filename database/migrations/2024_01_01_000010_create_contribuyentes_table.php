<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contribuyentes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_persona', ['natural', 'juridica'])->default('natural');
            $table->string('tipo_documento', 10)->default('DNI'); // DNI, RUC, CE
            $table->string('numero_documento', 20)->unique();
            $table->string('nombres')->nullable(); // persona natural
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('razon_social')->nullable(); // persona juridica
            $table->string('direccion')->nullable();
            $table->string('distrito')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->index('numero_documento');
            $table->index(['apellido_paterno', 'apellido_materno']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contribuyentes');
    }
};
