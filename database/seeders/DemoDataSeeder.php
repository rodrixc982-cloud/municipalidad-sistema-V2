<?php

namespace Database\Seeders;

use App\Models\Contribuyente;
use App\Models\DeclaracionPredio;
use App\Models\Empleado;
use App\Models\Expediente;
use App\Models\LicenciaFuncionamiento;
use App\Models\Predio;
use App\Models\TipoTramite;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@municipalidad.gob.pe')->first();

        if (! $admin) {
            return; // requiere que UserSeeder corra primero
        }

        // Contribuyentes de ejemplo
        $juan = Contribuyente::firstOrCreate(
            ['numero_documento' => '45678912'],
            [
                'tipo_persona' => 'natural',
                'tipo_documento' => 'DNI',
                'nombres' => 'Juan Carlos',
                'apellido_paterno' => 'Pérez',
                'apellido_materno' => 'Gómez',
                'direccion' => 'Jr. Los Álamos 123',
                'distrito' => 'Pucallpa',
                'telefono' => '961234567',
            ]
        );

        $comercial = Contribuyente::firstOrCreate(
            ['numero_documento' => '20451236789'],
            [
                'tipo_persona' => 'juridica',
                'tipo_documento' => 'RUC',
                'razon_social' => 'Inversiones El Progreso S.A.C.',
                'direccion' => 'Av. Centenario 456',
                'distrito' => 'Pucallpa',
                'telefono' => '987654321',
            ]
        );

        // Expediente de ejemplo (aprobado, para poder ver constancia/resolución PDF)
        $tramite = TipoTramite::where('codigo', 'TUPA-001')->first();

        if ($tramite) {
            $expediente = Expediente::firstOrCreate(
                ['numero_expediente' => now()->year.'-000001'],
                [
                    'contribuyente_id' => $juan->id,
                    'tipo_tramite_id' => $tramite->id,
                    'asunto' => 'Solicitud de constancia de posesión del predio ubicado en Jr. Los Álamos 123',
                    'estado' => 'aprobado',
                    'area_actual' => $tramite->area_responsable,
                    'registrado_por' => $admin->id,
                    'fecha_limite' => now()->addDays($tramite->plazo_dias),
                ]
            );
        }

        // Predio de ejemplo con declaración de autovalúo
        $predio = Predio::firstOrCreate(
            ['codigo_catastral' => 'P-0000001'],
            [
                'contribuyente_id' => $juan->id,
                'direccion' => 'Jr. Los Álamos 123',
                'distrito' => 'Pucallpa',
                'area_terreno' => 120.50,
                'area_construida' => 95.00,
                'uso' => 'vivienda',
                'condicion' => 'urbano',
            ]
        );

        $autovaluo = 45000.00;
        DeclaracionPredio::firstOrCreate(
            ['predio_id' => $predio->id, 'anio' => now()->year],
            [
                'valor_terreno' => 28000.00,
                'valor_construccion' => 17000.00,
                'valor_autovaluo' => $autovaluo,
                'impuesto_anual' => DeclaracionPredio::calcularImpuesto($autovaluo),
                'registrado_por' => $admin->id,
            ]
        );

        // Licencia de funcionamiento de ejemplo
        LicenciaFuncionamiento::firstOrCreate(
            ['numero_licencia' => 'LIC-'.now()->year.'-00001'],
            [
                'contribuyente_id' => $comercial->id,
                'nombre_comercial' => 'Botica El Progreso',
                'giro_negocio' => 'Venta de productos farmacéuticos',
                'direccion_local' => 'Av. Centenario 456',
                'fecha_emision' => now()->subMonths(2),
                'fecha_vencimiento' => now()->addMonths(10),
                'estado' => 'vigente',
            ]
        );

        // Empleado de ejemplo
        Empleado::firstOrCreate(
            ['dni' => '41234567'],
            [
                'nombres' => 'María Elena',
                'apellidos' => 'Torres Vásquez',
                'cargo' => 'Asistente de Rentas',
                'area' => 'Rentas',
                'regimen' => 'cas',
                'sueldo_base' => 1800.00,
                'fecha_ingreso' => now()->subYears(2),
            ]
        );
    }
}
