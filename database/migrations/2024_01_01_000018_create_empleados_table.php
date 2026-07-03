<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('dni', 15)->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cargo');
            $table->string('area');
            $table->enum('regimen', ['727', 'cas', 'locacion'])->default('cas');
            $table->decimal('sueldo_base', 10, 2)->default(0);
            $table->date('fecha_ingreso');
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
