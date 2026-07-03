<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_comprobante',
        'tipo_comprobante',
        'contribuyente_id',
        'concepto',
        'expediente_id',
        'predio_id',
        'monto',
        'metodo_pago',
        'cajero_id',
    ];

    protected function casts(): array
    {
        return ['monto' => 'decimal:2'];
    }

    public function contribuyente()
    {
        return $this->belongsTo(Contribuyente::class);
    }

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

    public function predio()
    {
        return $this->belongsTo(Predio::class);
    }

    public function cajero()
    {
        return $this->belongsTo(User::class, 'cajero_id');
    }

    public static function generarNumeroComprobante(string $tipo): string
    {
        $prefijo = $tipo === 'boleta' ? 'B' : 'R';
        $ultimo = static::where('numero_comprobante', 'like', "{$prefijo}-%")
            ->orderByDesc('id')
            ->first();

        $correlativo = 1;
        if ($ultimo) {
            $partes = explode('-', $ultimo->numero_comprobante);
            $correlativo = ((int) ($partes[1] ?? 0)) + 1;
        }

        return $prefijo.'-'.str_pad((string) $correlativo, 6, '0', STR_PAD_LEFT);
    }
}
