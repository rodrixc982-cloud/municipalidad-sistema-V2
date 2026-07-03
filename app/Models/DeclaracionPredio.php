<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclaracionPredio extends Model
{
    /**
     * Nombre de la tabla en la base de datos.
     */
    protected $table = 'declaraciones_predio';

    /**
     * Clave primaria.
     */
    protected $primaryKey = 'id';

    /**
     * Timestamps habilitados.
     */
    public $timestamps = true;

    /**
     * Campos asignables.
     */
    protected $fillable = [
        'predio_id',
        'anio',
        'valor_terreno',
        'valor_construccion',
        'valor_autovaluo',
        'impuesto_anual',
        'registrado_por',
    ];

    /**
     * Conversión de atributos.
     */
    protected function casts(): array
    {
        return [
            'valor_terreno' => 'decimal:2',
            'valor_construccion' => 'decimal:2',
            'valor_autovaluo' => 'decimal:2',
            'impuesto_anual' => 'decimal:2',
        ];
    }

    /**
     * Relación con Predio.
     */
    public function predio()
    {
        return $this->belongsTo(Predio::class);
    }

    /**
     * Usuario que registró la declaración.
     */
    public function registradoPor()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }

    /**
     * Calcula el Impuesto Predial.
     */
    public static function calcularImpuesto(float $autovaluo, float $valorUit = 5350.00): float
    {
        $tramo1 = 15 * $valorUit;
        $tramo2 = 60 * $valorUit;

        if ($autovaluo <= $tramo1) {
            return round($autovaluo * 0.002, 2);
        }

        if ($autovaluo <= $tramo2) {
            $baseTramo1 = $tramo1 * 0.002;
            $excedente = ($autovaluo - $tramo1) * 0.006;

            return round($baseTramo1 + $excedente, 2);
        }

        $baseTramo1 = $tramo1 * 0.002;
        $baseTramo2 = ($tramo2 - $tramo1) * 0.006;
        $excedente = ($autovaluo - $tramo2) * 0.01;

        return round($baseTramo1 + $baseTramo2 + $excedente, 2);
    }
}