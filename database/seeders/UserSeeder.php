<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['admin', 'mesa_partes', 'rentas', 'caja', 'rrhh'] as $rol) {
            Role::firstOrCreate(['name' => $rol]);
        }

        $admin = User::firstOrCreate(
            ['email' => 'admin@municipalidad.gob.pe'],
            [
                'name' => 'Administrador del Sistema',
                'password' => Hash::make('password'),
                'area' => 'Administración',
                'activo' => true,
            ]
        );
        $admin->assignRole('admin');

        $mesaPartes = User::firstOrCreate(
            ['email' => 'mesadepartes@municipalidad.gob.pe'],
            [
                'name' => 'Lucía Ramírez',
                'password' => Hash::make('password'),
                'area' => 'Mesa de Partes',
                'activo' => true,
            ]
        );
        $mesaPartes->assignRole('mesa_partes');

        $rentas = User::firstOrCreate(
            ['email' => 'rentas@municipalidad.gob.pe'],
            [
                'name' => 'Carlos Mendoza',
                'password' => Hash::make('password'),
                'area' => 'Rentas',
                'activo' => true,
            ]
        );
        $rentas->assignRole('rentas');
    }
}
