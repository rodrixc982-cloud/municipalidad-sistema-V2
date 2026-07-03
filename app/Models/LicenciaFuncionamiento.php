<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenciaFuncionamiento extends Model
{
    use HasFactory;

    protected $table = 'licencias_funcionamiento';

    protected $fillable = [
        'numero_licencia',
        'contribuyente_id',
        'nombre_comercial',
        'giro_negocio',
        'direccion_local',
        'fecha_emision',
        'fecha_vencimiento',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_emision' => 'date',
            'fecha_vencimiento' => 'date',
        ];
    }

    public function contribuyente()
    {
        return $this->belongsTo(Contribuyente::class);
    }
}
