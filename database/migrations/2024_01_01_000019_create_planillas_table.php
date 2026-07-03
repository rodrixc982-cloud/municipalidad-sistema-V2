<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->unsignedTinyInteger('mes');
            $table->unsignedSmallInteger('anio');
            $table->decimal('sueldo_bruto', 10, 2);
            $table->decimal('descuentos', 10, 2)->default(0);
            $table->decimal('sueldo_neto', 10, 2);
            $table->enum('estado', ['pendiente', 'pagado'])->default('pendiente');
            $table->date('fecha_pago')->nullable();
            $table->timestamps();

            $table->unique(['empleado_id', 'mes', 'anio']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};
