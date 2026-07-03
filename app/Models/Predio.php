<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_catastral',
        'contribuyente_id',
        'direccion',
        'distrito',
        'area_terreno',
        'area_construida',
        'uso',
        'condicion',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
            'area_terreno' => 'decimal:2',
            'area_construida' => 'decimal:2',
        ];
    }

    public function contribuyente()
    {
        return $this->belongsTo(Contribuyente::class);
    }

    public function declaraciones()
    {
        return $this->hasMany(DeclaracionPredio::class)->orderByDesc('anio');
    }

    public function declaracionVigente()
    {
        return $this->hasOne(DeclaracionPredio::class)->orderByDesc('anio');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public static function generarCodigoCatastral(): string
    {
        $ultimo = static::orderByDesc('id')->first();
        $correlativo = $ultimo ? $ultimo->id + 1 : 1;

        return 'P-'.str_pad((string) $correlativo, 7, '0', STR_PAD_LEFT);
    }
}
