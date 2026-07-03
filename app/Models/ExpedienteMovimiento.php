<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpedienteMovimiento extends Model
{
    protected $fillable = [
        'expediente_id',
        'area_origen',
        'area_destino',
        'accion',
        'comentario',
        'usuario_id',
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
