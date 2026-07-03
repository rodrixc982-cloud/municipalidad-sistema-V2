<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    use HasFactory;

    protected $table = 'tipos_tramite';

    protected $fillable = [
        'codigo',
        'nombre',
        'area_responsable',
        'costo',
        'plazo_dias',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
            'costo' => 'decimal:2',
        ];
    }

    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }
}
