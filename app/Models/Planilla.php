<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    protected $fillable = [
        'empleado_id',
        'mes',
        'anio',
        'sueldo_bruto',
        'descuentos',
        'sueldo_neto',
        'estado',
        'fecha_pago',
    ];

    protected function casts(): array
    {
        return [
            'sueldo_bruto' => 'decimal:2',
            'descuentos' => 'decimal:2',
            'sueldo_neto' => 'decimal:2',
            'fecha_pago' => 'date',
        ];
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
