<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'area',
        'activo',
        'foto_perfil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'activo' => 'boolean',
        ];
    }

    /**
     * URL pública de la foto de perfil, o null si no tiene.
     */
    public function getFotoUrlAttribute(): ?string
    {
        if ($this->foto_perfil) {
            return Storage::url($this->foto_perfil);
        }

        return null;
    }

    /**
     * Iniciales para el avatar fallback (ej: "JC" de "Juan Carlos Pérez").
     */
    public function getInicialesAttribute(): string
    {
        $partes = explode(' ', trim($this->name));
        if (count($partes) >= 2) {
            return strtoupper(substr($partes[0], 0, 1).substr($partes[1], 0, 1));
        }

        return strtoupper(substr($this->name, 0, 2));
    }

    public function expedientesRegistrados()
    {
        return $this->hasMany(Expediente::class, 'registrado_por');
    }
}
