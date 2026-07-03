<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('area')->nullable()->after('email'); // Mesa de Partes, Rentas, Caja, RRHH, Admin
            $table->boolean('activo')->default(true)->after('area');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['area', 'activo']);
        });
    }
};
