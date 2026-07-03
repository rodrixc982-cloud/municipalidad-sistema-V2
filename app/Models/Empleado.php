<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni',
        'nombres',
        'apellidos',
        'cargo',
        'area',
        'regimen',
        'sueldo_base',
        'fecha_ingreso',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
            'fecha_ingreso' => 'date',
            'sueldo_base' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planillas()
    {
        return $this->hasMany(Planilla::class)->orderByDesc('anio')->orderByDesc('mes');
    }
}
