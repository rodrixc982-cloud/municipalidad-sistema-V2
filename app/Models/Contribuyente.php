<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_persona',
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'razon_social',
        'direccion',
        'distrito',
        'telefono',
        'email',
        'activo',
    ];

    protected function casts(): array
    {
        return ['activo' => 'boolean'];
    }

    /**
     * Nombre o razón social para mostrar, sin importar el tipo de persona.
     */
    public function getNombreCompletoAttribute(): string
    {
        if ($this->tipo_persona === 'juridica') {
            return $this->razon_social ?? '';
        }

        return trim("{$this->nombres} {$this->apellido_paterno} {$this->apellido_materno}");
    }

    public function predios()
    {
        return $this->hasMany(Predio::class);
    }

    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }

    public function licencias()
    {
        return $this->hasMany(LicenciaFuncionamiento::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
