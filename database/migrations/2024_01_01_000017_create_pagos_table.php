<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_comprobante', 30)->unique();
            $table->enum('tipo_comprobante', ['boleta', 'recibo'])->default('recibo');
            $table->foreignId('contribuyente_id')->constrained('contribuyentes');
            $table->string('concepto'); // "Impuesto Predial 2026", "Tasa TUPA-001", etc.
            $table->foreignId('expediente_id')->nullable()->constrained('expedientes');
            $table->foreignId('predio_id')->nullable()->constrained('predios');
            $table->decimal('monto', 10, 2);
            $table->enum('metodo_pago', ['efectivo', 'tarjeta', 'transferencia'])->default('efectivo');
            $table->foreignId('cajero_id')->constrained('users');
            $table->timestamps();

            $table->index('numero_comprobante');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
