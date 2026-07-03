<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_expediente',
        'contribuyente_id',
        'tipo_tramite_id',
        'asunto',
        'descripcion',
        'estado',
        'area_actual',
        'registrado_por',
        'fecha_limite',
    ];

    protected function casts(): array
    {
        return ['fecha_limite' => 'date'];
    }

    public function contribuyente()
    {
        return $this->belongsTo(Contribuyente::class);
    }

    public function tipoTramite()
    {
        return $this->belongsTo(TipoTramite::class, 'tipo_tramite_id');
    }

    public function registradoPor()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }

    public function movimientos()
    {
        return $this->hasMany(ExpedienteMovimiento::class)->orderByDesc('created_at');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    /**
     * Genera el siguiente número de expediente correlativo del año, formato AAAA-NNNNNN.
     */
    public static function generarNumero(): string
    {
        $anio = now()->year;

        $ultimo = static::where('numero_expediente', 'like', "{$anio}-%")
            ->orderByDesc('id')
            ->first();

        $correlativo = 1;

        if ($ultimo) {
            $partes = explode('-', $ultimo->numero_expediente);
            $correlativo = ((int) ($partes[1] ?? 0)) + 1;
        }

        return $anio.'-'.str_pad((string) $correlativo, 6, '0', STR_PAD_LEFT);
    }

    /**
     * Colores de badge para el estado, usados en la vista.
     */
    public function colorEstado(): string
    {
        return match ($this->estado) {
            'registrado' => 'bg-slate-100 text-slate-700',
            'en_proceso' => 'bg-amber-100 text-amber-700',
            'observado' => 'bg-orange-100 text-orange-700',
            'aprobado' => 'bg-emerald-100 text-emerald-700',
            'rechazado' => 'bg-red-100 text-red-700',
            'finalizado' => 'bg-blue-100 text-blue-700',
            default => 'bg-slate-100 text-slate-700',
        };
    }
}
